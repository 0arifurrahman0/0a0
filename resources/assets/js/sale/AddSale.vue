<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-6">

					<!-- Customer Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('customer_id')}">
						<label for="customer_id" class="col-sm-4 control-label">
							Customer Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<select v-model="form.customer_id" @change="select" class="form-control" id="customer_id" name="customer_id">
							   <option value="">Select Customer</option>
							   <option v-for="list in lists" :value="list.id" v-text="list.customer_name"></option>
							</select>		

							<span v-if="form.errors.has('customer_id')" class="help-block">
								<strong v-text="form.errors.get('customer_id')"></strong>
							</span>
						</div>
					</div>	

					<!-- Sale Date -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('sale_date') }">
						<label for="sale_date" class="col-sm-4 control-label">
							Date
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>
							<div class="col-sm-8">
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
							<input v-model="form.sale_date" type="date" class="form-control datepicker pull-right" name="sale_date" id="sale_date">
						</div>
					
							<span v-if="form.errors.has('sale_date')" class="help-block">
								<strong v-text="form.errors.get('sale_date')"></strong>
							</span>		
					</div>		
				</div>
			</div>

				<div class="col-sm-6">
					<!-- Status -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('sale_status') }">
						<label for="sale_status" class="col-sm-4 control-label">
								Status
								<i class="fa fa-asterisk require text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
							</label>

							<div class="col-sm-8">
							<select v-model="form.sale_status" @change="select" class="form-control" name="sale_status" id="sale_status">
							    <option value="">Select</option>
							    <option>Delivered</option>
								<option>Pending</option>
								<option>Ordered</option>
							</select>										

							<span v-if="form.errors.has('sale_status')" class="help-block">
								<strong v-text="form.errors.get('sale_status')"></strong>
							</span>
						</div>	
					</div>

				<!-- Invoice Number -->
				<div :class="{'form-group': true, 'has-error': form.errors.has('sale_invoiceNo')}">
					<label for="sale_invoiceNo" class="col-sm-4 control-label">
						Invoice No
					</label>

					<div class="col-sm-8">
						<input v-model="form.sale_invoiceNo" type="text" class="form-control" name="sale_invoiceNo" id="sale_invoiceNo" placeholder="Invoice No">

						<span v-if="form.errors.has('sale_invoiceNo')" class="help-block">
							<strong v-text="form.errors.get('sale_invoiceNo')"></strong>
						</span>
					</div>
				</div>
				</div>
			</div>

		<div class="row">
				<div class="col-sm-10 col-sm-offset-2">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th style="width:30%;">Item Information</th>
								<th style="width:20%;">Quantity <i class="fa fa-asterisk require text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></th>
								<th style="width:25%;">Rate <i class="fa fa-asterisk require text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i></th>
								<th style="width:25%;">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
							<select v-model="form.product_id" @change="select" class="form-control" name="product_id" id="product_id">
							    <option value="">Select Item</option>
							    <option v-for="item in items" :value="item.id" v-text="item.product_name"></option>
							</select>		

							<span v-if="form.errors.has('product_id')" class="help-block">
								<strong v-text="form.errors.get('product_id')"></strong>
							</span>											
								</td>
								<td>
								<div :class="{'form-group': true, 'has-error': form.errors.has('sale_quantity')}">
									<input :value="form.sale_quantity" @change="updateQuantity" type="number" class="form-control" name="sale_quantity" id="sale_quantity" placeholder="Quantity">

									<span v-if="form.errors.has('sale_quantity')" class="help-block">
										<strong v-text="form.errors.get('sale_quantity')"></strong>
									</span>
								</div>
								</td>
								
								<td>
									<div :class="{'form-group': true, 'has-error': form.errors.has('sale_rate')}">
									<input :value="form.sale_rate"  @change="updateRate" type="number" step="any" class="form-control" name="sale_rate" id="sale_rate" placeholder="Rate">

							<span v-if="form.errors.has('sale_rate')" class="help-block">
								<strong v-text="form.errors.get('sale_rate')"></strong>
							</span>
						</div>
								</td>
								<td> 
									<input v-model="form.sale_total" type="number" step="any" class="form-control" name="sale_total" id="sale_total" placeholder="Total Price">

							<span v-if="form.errors.has('sale_total')" class="help-block">
								<strong v-text="form.errors.get('sale_total')"></strong>
							</span>
								</td>

							</tr>	
						</tbody>
		
					</table>									
				</div>
			</div>				
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button :disabled="form.errors.any()" type="submit" class="btn btn-info">Save</button>
						</div>
					</div>
				</div>
				<div class="col-sm-6"></div>				
			</div>			
		</form>		
	</div>
</template>

<script>
	export default{
		props: ['products','customers'],

		data() {
			return {
				items: this.products,
				lists: this.customers,

				form: new Form({
					customer_id: '',
					sale_status: '',
					sale_date: '',
					sale_invoiceNo: '',
					product_id: '',
					sale_quantity: '',
					sale_rate: '',
					sale_total: '',
				})
			}
		},

		methods: {
			select(e){
				this.form.errors.clear(e.target.name);
			},

			updateQuantity(event) {
			        this.form.sale_quantity = event.target.value
			        this.form.sale_total = this.form.sale_quantity * this.form.sale_rate
			      },
			
			updateRate(event) {
			        this.form.sale_rate = event.target.value
			        this.form.sale_total = this.form.sale_quantity * this.form.sale_rate
			      },     

			onSubmit() {
				this.form
				.post('/sale')
				.then(status => this.status());
			},

			status() {
				flash('Sale Added.');
			}
		}
	}
</script>