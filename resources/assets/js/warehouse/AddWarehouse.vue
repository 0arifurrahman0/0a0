<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-8">

					<!-- Warehouse Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('warehouse_name')}">
						<label for="warehouse_name" class="col-sm-4 control-label">
							Warehouse Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.warehouse_name" type="text" class="form-control" name="warehouse_name" id="warehouse_name" placeholder="Warehouse Name">

							<span v-if="form.errors.has('warehouse_name')" class="help-block">
								<strong v-text="form.errors.get('warehouse_name')"></strong>
							</span>
						</div>
					</div>	

					<!-- Warehouse Details -->
					<div class="form-group">
						<label for="warehouse_details" class="col-sm-4 control-label">
						Warehouse Details
						</label>

						<div class="col-sm-8">
							<textarea id="warehouse_details" v-model="form.warehouse_details" name="warehouse_details" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
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
					warehouse_name: '',
					warehouse_details: '',
				})
			}
		},

		methods: {
			onSubmit() {
				this.form
				.post('/warehouse')
				.then(status => this.status());
			},

			status() {
				flash('Warehouse added.');
			}
		}
	}
</script>