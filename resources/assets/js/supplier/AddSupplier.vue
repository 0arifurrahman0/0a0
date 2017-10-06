<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-6">

					<!-- Supplier Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('supplier_name')}">
						<label for="supplier_name" class="col-sm-4 control-label">
							Supplier Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.supplier_name" type="text" class="form-control" name="supplier_name" id="supplier_name" placeholder="Supplier Name">

							<span v-if="form.errors.has('supplier_name')" class="help-block">
								<strong v-text="form.errors.get('supplier_name')"></strong>
							</span>
						</div>
					</div>	

					<!-- Supplier Phone -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('supplier_phone') }">
						<label for="supplier_phone" class="col-sm-4 control-label">
							Supplier Phone
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="tel" v-model="form.supplier_phone" class="form-control" name="supplier_phone" id="supplier_phone" placeholder="Supplier Phone">

							<span v-if="form.errors.has('supplier_phone')" class="help-block">
								<strong v-text="form.errors.get('supplier_phone')"></strong>
							</span>
						</div>
					</div>

					<!-- Supplier Address -->
					<div class="form-group">
						<label for="supplier_address" class="col-sm-4 control-label">
						Supplier Address
						</label>

						<div class="col-sm-8">
							<textarea id="supplier_address" v-model="form.supplier_address" name="supplier_address" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>
				</div>

				<div class="col-sm-6">
					<!-- Supplier Email -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('supplier_email') }">
						<label for="supplier_email" class="col-sm-4 control-label">
							Supplier Email
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="email" v-model="form.supplier_email" class="form-control" name="supplier_email" id="supplier_email" placeholder="Supplier Email">

							<span v-if="form.errors.has('supplier_email')" class="help-block">
								<strong v-text="form.errors.get('supplier_email')"></strong>
							</span>
						</div>
					</div>

					<!-- Supplier Company -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('supplier_company') }">
						<label for="supplier_company" class="col-sm-4 control-label">
							Supplier Company
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="text" v-model="form.supplier_company" class="form-control" name="supplier_company" id="supplier_company" placeholder="Supplier Company">

							<span v-if="form.errors.has('supplier_company')" class="help-block">
								<strong v-text="form.errors.get('supplier_company')"></strong>
							</span>
						</div>
					</div>

					<!-- Supplier Details -->
					<div class="form-group">
						<label for="supplier_description" class="col-sm-4 control-label">
						Supplier Details
						</label>

						<div class="col-sm-8">
							<textarea id="supplier_description" v-model="form.supplier_description" name="supplier_description" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
					supplier_name: '',
					supplier_email: '',
					supplier_phone: '',
					supplier_company: '',
					supplier_address: '',
					supplier_description: '',
				})
			}
		},

		methods: {
			onSubmit() {
				this.form.post('/supplier').then(status => this.status());
			},

			status() {
				flash('Supplier added.');
			}
		}
	}
</script>