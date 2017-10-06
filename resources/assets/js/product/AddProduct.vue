<template>
	<div class="">
		<form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-6">
					<!-- Product Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('product_name')}">
						<label for="product_name" class="col-sm-4 control-label">
							Product Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input v-model="form.product_name" type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">

							<span v-if="form.errors.has('product_name')" class="help-block">
								<strong v-text="form.errors.get('product_name')"></strong>
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
							<select type="text" v-model="form.category_id" class="form-control category_id" id="category_id" name="category_id" @change="selected">
							   <option value="0" selected >Select Category</option>
							   <option v-for="menu in menus" :value="menu.id" v-text="menu.category_name"></option>
							</select>		

							<span v-if="form.errors.has('category_id')" class="help-block">
								<strong v-text="form.errors.get('category_id')"></strong>
							</span>
						</div>
					</div>	

					<!-- SubCategory Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('subcategory_id')}" v-if="subcategories.length > 0">
						<label for="subcategory_id" class="col-sm-4 control-label">
							SubCategory Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<select v-model="form.subcategory_id" @change="select" class="form-control" id="subcategory_id" name="subcategory_id">
							    <option value="">Select subcategory</option>
							    <option v-for="subcategory in subcategories" :value="subcategory.id" v-text="subcategory.subcategory_name"></option>
							</select>		

							<span v-if="form.errors.has('subcategory_id')" class="help-block">
								<strong v-text="form.errors.get('subcategory_id')"></strong>
							</span>
						</div>
					</div>	

					<!-- Supplier Name -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('supplier_id')}">
						<label for="supplier_id" class="col-sm-4 control-label">
							Supplier Name
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<select v-model="form.supplier_id" name="supplier_id" class="form-control" id="supplier_id" @change="select">
							    <option value="">Select Supplier</option>
							   <option v-for="list in lists" :value="list.id" v-text="list.supplier_name"></option>
							</select>		

							<span v-if="form.errors.has('supplier_id')" class="help-block">
								<strong v-text="form.errors.get('supplier_id')"></strong>
							</span>
						</div>
					</div>	

					<!-- Product Unit -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_unit') }">
						<label for="product_unit" class="col-sm-4 control-label">
							Product Unit
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="number" v-model="form.product_unit" class="form-control" name="product_unit" id="product_unit" placeholder="Product unit">

							<span v-if="form.errors.has('product_unit')" class="help-block">
								<strong v-text="form.errors.get('product_unit')"></strong>
							</span>
						</div>
					</div>

					<!-- Product Quanity -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_alertquantity') }">
						<label for="product_alertquantity" class="col-sm-4 control-label">
							Alert Quantity
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="number" v-model="form.product_alertquantity" class="form-control" name="product_alertquantity" id="product_alertquantity" placeholder="Product alertquantity">

							<span v-if="form.errors.has('product_alertquantity')" class="help-block">
								<strong v-text="form.errors.get('product_alertquantity')"></strong>
							</span>
						</div>
					</div>

					<!-- Supplier Price -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_supplierPrice') }">
						<label for="product_supplierPrice" class="col-sm-4 control-label">
							Product Cost
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="number" min="0" max="10000000" step="any" v-model="form.product_supplierPrice" class="form-control" name="product_supplierPrice" id="product_supplierPrice" placeholder="Cost Price">

							<span v-if="form.errors.has('product_supplierPrice')" class="help-block">
								<strong v-text="form.errors.get('product_supplierPrice')"></strong>
							</span>
						</div>
					</div>

					<!-- Product Image -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_image') }">
						<label for="product_image" class="col-sm-4 control-label">
							Product Image
						</label>
						<div class="col-sm-8">
							<div v-if="!image">
								<image-upload name="product_image" @loaded="onLoad"></image-upload>
							</div>
							<div v-else>
								<img :src="image"  alt=""> <br>
								<input type="button" @click="removeImage" value="Remove Image" class="btn btn-link">
							</div>
							<span v-if="form.errors.has('product_image')" class="help-block">
								<strong v-text="form.errors.get('product_image')"></strong>
							</span>
						</div>
						
					</div>					
				</div>

				<div class="col-sm-6">
					<!-- Sell Price -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_sellPrice') }">
						<label for="product_sellPrice" class="col-sm-4 control-label">
							Product Price
							<i class="fa fa-asterisk text-danger require" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Required"></i>
						</label>

						<div class="col-sm-8">
							<input type="number" min="0" max="10000000" step="any" v-model="form.product_sellPrice" class="form-control" name="product_sellPrice" id="product_sellPrice" placeholder="Sell Price">

							<span v-if="form.errors.has('product_sellPrice')" class="help-block">
								<strong v-text="form.errors.get('product_sellPrice')"></strong>
							</span>
						</div>
					</div>
					
					<!-- Product Code -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_code') }">
						<label for="product_code" class="col-sm-4 control-label">
							Code
						</label>
					<div class="col-sm-8">
						<input type="text" v-model="form.product_code" class="form-control" name="product_code" id="product_code" placeholder="Product Code">		
							</div>
							<span v-if="form.errors.has('product_code')" class="help-block">
								<strong v-text="form.errors.get('product_code')"></strong>
							</span>
						</div>

					<!--Tax Rate -->
					<div :class="{ 'form-group': true, 'has-error': form.errors.has('product_tax') }">
						<label for="product_tax" class="col-sm-4 control-label">
							Tax Rate
						</label>

						<div class="col-sm-8">
							<input type="number" min="0" max="100" step="any" v-model="form.product_tax" class="form-control" name="product_tax" id="product_tax" placeholder="Tax Rate">

							<span v-if="form.errors.has('product_tax')" class="help-block">
								<strong v-text="form.errors.get('product_tax')"></strong>
							</span>
						</div>
					</div>


					<!-- Warehouse -->
					<div :class="{'form-group': true, 'has-error': form.errors.has('warehouse_id')}">
						<label for="warehouse_id" class="col-sm-4 control-label">
							Ware House
						</label>

						<div class="col-sm-8">
							<select type="text" v-model="form.warehouse_id" class="form-control" name="warehouse_id" id="warehouse_id">
							    <option value="">Select House</option>
							   <option v-for="item in items" :value="item.id" v-text="item.warehouse_name"></option>
							</select>		

							<span v-if="form.errors.has('warehouse_id')" class="help-block">
								<strong v-text="form.errors.get('warehouse_id')"></strong>
							</span>
						</div>
					</div>	

					<!-- Product Details -->
					<div class="form-group">
						<label for="product_details" class="col-sm-4 control-label">
						Product Details
						</label>

						<div class="col-sm-8">
							<textarea id="product_details" v-model="form.product_details" name="product_details" class="form-control" rows="3" placeholder="Enter ..."></textarea>
						</div>
					</div>

				<!-- Product Details for Invoice -->
					<div class="form-group">
						<label for="product_detailsforinvoice" class="col-sm-4 control-label">
						Details for Invoice
						</label>

						<div class="col-sm-8">
							<textarea id="product_detailsforinvoice" v-model="form.product_detailsforinvoice" name="product_detailsforinvoice" class="form-control" rows="3" placeholder="Enter ..."></textarea>
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

	import ImageUpload from './ImageUpload.vue';

	export default{
		props: ['warehouses','suppliers','categories','states'],

		components: { ImageUpload },

		data() {
			return {
				image: '',
				subcategories: '',
				items: this.warehouses,
				lists: this.suppliers,
				menus: this.categories,
				form: new Form({
					product_name: '',
					category_id: '',
					subcategory_id: '',
					supplier_id: '',
					product_alertquantity: '',
					product_supplierPrice: '',
					product_sellPrice: '',
					product_image: '',
					product_code: '',
					product_unit: '',
					warehouse_id: '',
					product_tax: '',
					product_detailsforinvoice: '',
					product_details: '',
				})
			}
		},

		methods: {

			select(e){
				this.form.errors.clear(e.target.name);
			},

			selected(e) {
				this.form.errors.clear(e.target.name);
				var id = this.form.category_id;
				console.log(id);
				axios.get('/product/create/ajax/' + id)
				  .then((response)=>{
				  		this.subcategories = '';
				  		this.subcategories = response.data;
				  })
				  .catch((error) => {
				        console.log(error);
				  }); 
			},

			onLoad(image) {
				this.image = image.src;
				this.form.product_image = image.src;
			},

			removeImage() {
				this.image = '';
			},

			onSubmit() {
				this.form.post('/product').then(status => this.status());
			},

			status() {
				flash('Product added.');
				this.removeImage();
			}
		}
	}
</script>