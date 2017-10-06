<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
			<div class="row">
				<div class="col-sm-8">

					<!-- Sub Category Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('subcategory_name')}">
						<label for="subcategory_name" class="col-sm-4 control-label">
							Sub Category Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.subcategory_name" type="text" class="form-control" name="subcategory_name" id="subcategory_name" placeholder="category Name">

							<span v-if="form.errors.has('subcategory_name')" class="help-block">
								<strong v-text="form.errors.get('subcategory_name')"></strong>
							</span>
						</div>
					</div>	

					<!-- Category Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('category_id')}">
						<label for="category_id" class="col-sm-4 control-label">
							Category Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.category_id" class="form-control" name="category_id" id="category_id">
							    <option value="">None</option>
							   	<option 
								   	v-for="item in items" 
								   	:value="item.id" 
								   	v-text="item.category_name"

							   	></option>
							</select>		

							<span v-if="form.errors.has('category_id')" class="help-block">
								<strong v-text="form.errors.get('category_id')"></strong>
							</span>
						</div>
					</div>	

					<!-- Category Details -->
					<div class="form-group">
						<label for="subcategory_details" class="col-sm-4 control-label">
						Sub Category Details
						</label>

						<div class="col-sm-8">
							<textarea id="subcategory_details" v-model="form.subcategory_details" name="subcategory_details" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button :disabled="form.errors.any()" type="submit" class="btn btn-info">Update</button>
							<button type="button" onClick="window.location.href='/subcategory'" class="btn btn-primary">Cancel</button>
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
		props: ['subcategory','categories'],

		data() {
			return {
				items: this.categories,
				form: new Form ({
					subcategory_name: this.subcategory.subcategory_name,
					category_id: this.subcategory.category_id,
					subcategory_details: this.subcategory.subcategory_details,
				}),

				url: '/subcategory/' + this.subcategory.id
			}
		},

		methods: {
			onSubmit() {
				this.form.patch(this.url).then(status => this.status());
			},

			status() {
				flash('Sub Category info Updated.');
				window.location.href = '/subcategory';
			}
		}
	}
		//v-if="form.category_id == item.id ? 'selected' : ''" 
</script>