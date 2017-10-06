<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-8">

					<!-- Category Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('category_name')}">
						<label for="category_name" class="col-sm-4 control-label">
							Category Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.category_name" type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name">

							<span v-if="form.errors.has('category_name')" class="help-block">
								<strong v-text="form.errors.get('category_name')"></strong>
							</span>
						</div>
					</div>	

					<!-- Category Details -->
					<div class="form-group">
						<label for="category_details" class="col-sm-4 control-label">
						Category Details
						</label>

						<div class="col-sm-8">
							<textarea id="category_details" v-model="form.category_details" name="category_details" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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
					category_name: '',
					category_details: '',
				})
			}
		},

		methods: {
			onSubmit() {
				this.form.post('/category').then(status => this.status());
			},

			status() {
				flash('Category added.');
			}
		}
	}
</script>