<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-6">

					<!-- Customer Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('customer_name')}">
						<label for="customer_name" class="col-sm-4 control-label">
							Customer Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.customer_name" type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Customer Name">

							<span v-if="form.errors.has('customer_name')" class="help-block">
								<strong v-text="form.errors.get('customer_name')"></strong>
							</span>
						</div>
					</div>	

					<!-- Customer Phone -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('customer_phone') }">
						<label for="customer_phone" class="col-sm-4 control-label">
							Customer Phone
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="tel" v-model="form.customer_phone" class="form-control" name="customer_phone" id="customer_phone" placeholder="Customer Phone">

							<span v-if="form.errors.has('customer_phone')" class="help-block">
								<strong v-text="form.errors.get('customer_phone')"></strong>
							</span>
						</div>
					</div>

					<!-- Customer Address -->
					<div class="form-group">
						<label for="customer_address" class="col-sm-4 control-label">
						Customer Address
						</label>

						<div class="col-sm-8">
							<textarea id="customer_address" v-model="form.customer_address" name="customer_address" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<!-- Customer Email -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('customer_email') }">
						<label for="customer_email" class="col-sm-4 control-label">
							Customer Email
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="email" v-model="form.customer_email" class="form-control" name="customer_email" id="customer_email" placeholder="Customer Email">

							<span v-if="form.errors.has('customer_email')" class="help-block">
								<strong v-text="form.errors.get('customer_email')"></strong>
							</span>
						</div>
					</div>

					<!-- customer Details -->
					<div class="form-group">
						<label for="customer_description" class="col-sm-4 control-label">
						Customer Details
						</label>

						<div class="col-sm-8">
							<textarea id="customer_description" v-model="form.customer_description" name="customer_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button :disabled="form.errors.any()" type="submit" class="btn btn-info">Update</button>
							<button type="button" onClick="window.location.href='/customer'" class="btn btn-primary">Cancel</button>
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
		props: ['customer'],

		data() {
			return {
				form: new Form ({
					customer_name: this.customer.customer_name,
					customer_email: this.customer.customer_email,
					customer_phone: this.customer.customer_phone,
					customer_company: this.customer.customer_company,
					customer_address: this.customer.customer_address,
					customer_description: this.customer.customer_description,
					customer_description: this.customer.customer_description,
				}),

				url: '/customer/' + this.customer.id
			}
		},

		methods: {
			onSubmit() {
				this.form.patch(this.url).then(status => this.status());
			},

			status() {
				flash('Customer info Updated.');
				window.location.href = '/customer';
			}
		}
	}
</script>