<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
				<div class="row">
					<div class="col-sm-6">

						<!-- Supplier Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('supplier_id')}">
						<label for="supplier_id" class="col-sm-4 control-label">
							Supplier Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<select v-model="form.supplier_id" @change="select" class="form-control" id="supplier_id" name="supplier_id">
							   <option value="">Select Supplier</option>
							   <option v-for="list in lists" :value="list.id" v-text="list.supplier_name"></option>
							</select>		

							<span v-if="form.errors.has('supplier_id')" class="help-block">
								<strong v-text="form.errors.get('supplier_id')"></strong>
							</span>
						</div>
					</div>		

						<!-- Purchase Date -->
						<div :class="{ 'form-group': true, 'has-error': form.errors.has('purchase_date') }">
							<label for="purchase_date" class="col-sm-4 control-label">
								Date
								<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
								</label>
								<div class="col-sm-8">
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
								<input v-model="form.purchase_date" type="date" class="form-control datepicker pull-right" name="purchase_date" id="purchase_date">
							</div>
						</div>
								<span v-if="form.errors.has('purchase_date')" class="help-block">
									<strong v-text="form.errors.get('purchase_date')"></strong>
								</span>		
					</div>
				</div>

					<div class="col-sm-6">
						<!-- Status -->
						<div :class="{ 'form-group': true, 'has-error': form.errors.has('purchase_status') }">
							<label for="purchase_status" class="col-sm-4 control-label">
									Status
									<i class="fa fa-asterisk require text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
								</label>

								<div class="col-sm-8">
								<select type="text" v-model="form.purchase_status" @change="select" class="form-control" name="purchase_status" id="purchase_status">
								    <option value="">Select</option>
								    <option>Received</option>
									<option>Pending</option>
									<option>Ordered</option>
								</select>										
								</div>

								<span v-if="form.errors.has('purchase_status')" class="help-block">
									<strong v-text="form.errors.get('purchase_status')"></strong>
								</span>
						</div>

					<!-- Invoice Number -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('purchase_invoiceNo')}">
						<label for="purchase_invoiceNo" class="col-sm-4 control-label">
							Invoice No
						</label>

						<div class="col-sm-8">
							<input v-model="form.purchase_invoiceNo" type="text" class="form-control" name="purchase_invoiceNo" id="purchase_invoiceNo" placeholder="Invoice No">

							<span v-if="form.errors.has('purchase_invoiceNo')" class="help-block">
								<strong v-text="form.errors.get('purchase_invoiceNo')"></strong>
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
									<div :class="{'form-group': true, 'has-error': form.errors.has('purchase_quantity')}">	
										<input :value="form.purchase_quantity" @change="updateQuantity" type="number" class="form-control" name="purchase_quantity" id="purchase_quantity" placeholder="Quantity">

							<span v-if="form.errors.has('purchase_quantity')" class="help-block">
									<strong v-text="form.errors.get('purchase_quantity')"></strong>
								</span>
							</div>
									</td>
									
									<td>
									<div :class="{'form-group': true, 'has-error': form.errors.has('purchase_rate')}">	
										<input :value="form.purchase_rate"  @change="updateRate" type="number" step="any" class="form-control" name="purchase_rate" id="purchase_rate" placeholder="Rate">

								<span v-if="form.errors.has('purchase_rate')" class="help-block">
									<strong v-text="form.errors.get('purchase_rate')"></strong>
								</span>
							</div>
									</td>
									<td>
										<input v-model="form.purchase_total" type="number" step="any" class="form-control" name="purchase_total" id="purchase_total" placeholder="Total Price">

								<span v-if="form.errors.has('purchase_total')" class="help-block">
									<strong v-text="form.errors.get('purchase_total')"></strong>
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
							<button :disabled="form.errors.any()" type="submit" class="btn btn-info">Update</button>
							<button type="button" onClick="window.location.href='/purchase'" class="btn btn-primary">Cancel</button>
						</div>
					</div>
				</div>
				<div class="col-sm-6"></div>				
			</div>			
		</form>		
	</div>
</template>

<script>
	export default {
		props: ['purchase','products','suppliers'],

		data() {
			return {
				items: this.products,
				lists: this.suppliers,

				form: new Form ({
					supplier_id: this.purchase.supplier_id,
					purchase_date: this.purchase.purchase_date,
					purchase_status: this.purchase.purchase_status,
					purchase_invoiceNo: this.purchase.purchase_invoiceNo,
					product_id: this.purchase.product_id,
					purchase_quantity: this.purchase.purchase_quantity,
					purchase_rate: this.purchase.purchase_rate,
					purchase_total: this.purchase.purchase_total,
				}),

				url: '/purchase/' + this.purchase.id
			}
		},

		methods: {
			select(e){
				this.form.errors.clear(e.target.name);
			},

			updateQuantity(event) {
			    this.form.purchase_quantity = event.target.value
			    this.form.purchase_total = this.form.purchase_quantity * this.form.purchase_rate
			},
			
			updateRate(event) {
				this.form.purchase_rate = event.target.value
			    this.form.purchase_total = this.form.purchase_quantity * this.form.purchase_rate        
			},  


			onSubmit() {
				this.form.patch(this.url).then(status => this.status());
			},

			status() {
				flash('Purchase updated.');
				window.location.href = '/purchase';
			}
		}
	}
</script>