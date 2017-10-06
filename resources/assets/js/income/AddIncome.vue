<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-6">

					<!-- Income Date -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('income_paymentDate')}">
						<label for="income_paymentDate" class="col-sm-4 control-label">
							Payment Date
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.income_paymentDate" type="date" class="form-control" name="income_paymentDate" id="income_paymentDate" placeholder="00-00-0000">

							<span v-if="form.errors.has('income_paymentDate')" class="help-block">
								<strong v-text="form.errors.get('income_paymentDate')"></strong>
							</span>
						</div>
					</div>	

					<!-- Customer Name (Payment From) -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('income_paymentFrom') }">
						<label for="income_paymentFrom" class="col-sm-4 control-label">
							Payment From
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="text" v-model="form.income_paymentFrom" class="form-control" name="income_paymentFrom" id="income_paymentFrom" placeholder="Customer Name">

							<span v-if="form.errors.has('income_paymentFrom')" class="help-block">
								<strong v-text="form.errors.get('income_paymentFrom')"></strong>
							</span>
						</div>
					</div>

					<!-- (Payment Type) -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('income_paymentType') }">
						<label for="income_paymentType" class="col-sm-4 control-label">
							Payment Type
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.income_paymentType" class="form-control" name="income_paymentType" id="income_paymentType">
							    <option>Select Type</option>
							    <option>Cash</option>
								<option>Cheque</option>
								<option>Pay Order</option>
							</select>			

							<span v-if="form.errors.has('income_paymentType')" class="help-block">
								<strong v-text="form.errors.get('income_paymentType')"></strong>
							</span>
						</div>
					</div>

					<!-- (Payment Account) -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('income_paymentAccount') }">
						<label for="income_paymentAccount" class="col-sm-4 control-label">
							Payment Account
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.income_paymentAccount" class="form-control" name="income_paymentAccount" id="income_paymentAccount">
							    <option>Select Account</option>
							    <option>Utility</option>
								<option>Service</option>
								<option>Current</option>
							</select>			

							<span v-if="form.errors.has('income_paymentAccount')" class="help-block">
								<strong v-text="form.errors.get('income_paymentAccount')"></strong>
							</span>
						</div>
					</div>

					
				</div>

				<div class="col-sm-6">
					<!-- Payment Amount -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('income_amount') }">
						<label for="income_amount" class="col-sm-4 control-label">
							Amount
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="number" min="0" max="10000000" step="any" v-model="form.income_amount" class="form-control" name="income_amount" id="income_amount" placeholder="Amount">

							<span v-if="form.errors.has('income_amount')" class="help-block">
								<strong v-text="form.errors.get('income_amount')"></strong>
							</span>
						</div>
					</div>

					<!-- Income Details -->
					<div class="form-group">
						<label for="income_details" class="col-sm-4 control-label">
						Income Details
						</label>

						<div class="col-sm-8">
							<textarea id="income_details" v-model="form.income_details" name="income_details" class="form-control" rows="5" placeholder="Enter ..."></textarea>
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
					income_paymentDate: '',
					income_paymentFrom: '',
					income_amount: '',
					income_paymentAccount: '',
					income_paymentType: '',
					income_details: '',
				})
			}
		},

		methods: {
			onSubmit() {
				this.form
				.post('/income')
				.then(status => this.status());
			},

			status() {
				flash('Income added.');
			}
		}
	}
</script>