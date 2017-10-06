<template>
	<div>
		<table v-if="purchases.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:5%;">Sl</th>
					<th style="width:10%;">Item Name</th>
					<th style="width:15%;">Supplier Name</th>
					<th style="width:10%;">Invoice No</th>
					<th style="width:10%;">Status</th>
					<th style="width:10%;">Quantity</th>
					<th style="width:10%;">Price</th>
					<th style="width:10%;">Total</th>
					<th style="width:10%;">Date</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<purchase 
					v-for="(purchase, index) in purchases" 
					v-bind:purchase="purchase" 
					v-bind:index="index"
					v-bind:key="purchase.id"
				></purchase>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Purchase from './Purchase.vue';

	export default {

		components: { Purchase },

		data() {
			return {
				dataSet: false,
				purchases: []
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
				return '/fetchPurchase/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.purchases = data.data;
			}
		}
	}
</script>