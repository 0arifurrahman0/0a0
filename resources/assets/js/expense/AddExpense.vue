<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-6">

					<!-- expense Date -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('expense_paymentDate')}">
						<label for="expense_paymentDate" class="col-sm-4 control-label">
							Payment Date
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.expense_paymentDate" type="date" class="form-control" name="expense_paymentDate" id="expense_paymentDate" placeholder="00-00-0000">

							<span v-if="form.errors.has('expense_paymentDate')" class="help-block">
								<strong v-text="form.errors.get('expense_paymentDate')"></strong>
							</span>
						</div>
					</div>	

					<!-- Supplier Name (Payment To) -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('expense_paymentTo') }">
						<label for="expense_paymentTo" class="col-sm-4 control-label">
							Payment To
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="text" v-model="form.expense_paymentTo" class="form-control" name="expense_paymentTo" id="expense_paymentTo" placeholder="Supplier Name">

							<span v-if="form.errors.has('expense_paymentTo')" class="help-block">
								<strong v-text="form.errors.get('expense_paymentTo')"></strong>
							</span>
						</div>
					</div>

					<!-- (Payment Type) -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('expense_paymentType') }">
						<label for="expense_paymentType" class="col-sm-4 control-label">
							Payment Type
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.expense_paymentType" class="form-control" name="expense_paymentType" id="expense_paymentType">
							    <option>Select Type</option>
							    <option>Cash</option>
								<option>Cheque</option>
								<option>Pay Order</option>
							</select>			

							<span v-if="form.errors.has('expense_paymentType')" class="help-block">
								<strong v-text="form.errors.get('expense_paymentType')"></strong>
							</span>
						</div>
					</div>

					<!-- (Payment Account) -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('expense_paymentAccount') }">
						<label for="expense_paymentAccount" class="col-sm-4 control-label">
							Payment Account
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.expense_paymentAccount" class="form-control" name="expense_paymentAccount" id="expense_paymentAccount">
							    <option>Select Account</option>
							    <option>Utility</option>
								<option>Service</option>
								<option>Product</option>
							</select>			

							<span v-if="form.errors.has('expense_paymentAccount')" class="help-block">
								<strong v-text="form.errors.get('expense_paymentAccount')"></strong>
							</span>
						</div>
					</div>

					
				</div>

				<div class="col-sm-6">
					<!-- Payment Amount -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('expense_amount') }">
						<label for="expense_amount" class="col-sm-4 control-label">
							Amount
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="number" min="0" max="10000000" step="any" v-model="form.expense_amount" class="form-control" name="expense_amount" id="expense_amount" placeholder="Amount">

							<span v-if="form.errors.has('expense_amount')" class="help-block">
								<strong v-text="form.errors.get('expense_amount')"></strong>
							</span>
						</div>
					</div>

					<!-- expense Details -->
					<div class="form-group">
						<label for="expense_details" class="col-sm-4 control-label">
						Expense Details
						</label>

						<div class="col-sm-8">
							<textarea id="expense_details" v-model="form.expense_details" name="expense_details" class="form-control" rows="5" placeholder="Enter ..."></textarea>
						</div>
					</div>
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

		data() {
			return {
				form: new Form({
					expense_paymentDate: '',
					expense_paymentTo: '',
					expense_amount: '',
					expense_paymentAccount: '',
					expense_paymentType: '',
					expense_details: '',
				})
			}
		},

		methods: {
			onSubmit() {
				this.form
				.post('/expense')
				.then(status => this.status());
			},

			status() {
				flash('Expense added.');
			}
		}
	}
</script>