<template>
	<div>
		<table v-if="products.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:10%;">Sl</th>
					<th style="width:15%;">Name</th>
					<th style="width:10%;">Category</th>
					<th style="width:15%;">Supplier Name</th>
					<th style="width:10%;">Cost Price</th>
					<th style="width:10%;">Price</th>
					<th style="width:10%;">Unit</th>
					<th style="width:10%;">Image</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<product 
					v-for="(product, index) in products" 
					v-bind:product="product" 
					v-bind:index="index"
					v-bind:key="product.id"
				></product>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import product from './Product.vue';

	export default {

		components: { product },

		data() {
			return {
				dataSet: false,
				products: []
			}
		},

		created() {
			this.fetch();
		},

		methods: {
			fetch(page) {
				axios.get(this.url(page))
				.then(this.refresh);
			},

			url(page) {
				if (! page) {
					let query = location.search.match(/page=(\d+)/);
					page = query ? query[1] : 1;
				}
				return '/fetchProduct/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.products = data.data;
			}
		}
	}
</script>