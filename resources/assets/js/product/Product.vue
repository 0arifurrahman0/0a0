<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ product.product_name }}</td>
		<td>
			{{ product.category_name }} <br>
			<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
			{{ product.subcategory_name }}
		</td>
		<td>{{ product.supplier_name }}</td>
		<td>{{ product.product_supplierPrice }}</td>
		<td>{{ product.product_sellPrice }}</td>
		<td>{{ product.product_unit }}</td>
		<td class="text-center">
			<img :src="image" style="width:32px; height:32px;" alt="">
		</td>
		<td>
			<a :href="show" class="btn btn-xs btn-success">
				<i class="fa fa-folder-open" aria-hidden="true"></i>
			</a>
			<a :href="edit" class="btn btn-xs btn-success">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			</a>

			<button @click="destroy" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		</td>
	</tr>
</template>

<script>
	export default{
		props: ['product','index'],

		data() {
			return {
				edit: '/product/' + this.product.id + '/edit',
				show: '/product/' + this.product.id,
				image: '/images/products/' + this.product.product_image
			}
		},

		methods: {
			destroy() {

				this.$swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
				}).then(() => {
					axios.delete('/product/' + this.product.id);

					$(this.$el).fadeOut(300, () => {
						flash('Product has been deleted');
					});
				});
			}
		}
	}
</script>