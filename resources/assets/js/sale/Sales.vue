<template>
	<div>
		<table v-if="sales.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:5%;">Sl</th>
					<th style="width:10%;">Item Name</th>
					<th style="width:15%;">Customer Name</th>
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
				<sale 
					v-for="(sale, index) in sales" 
					v-bind:sale="sale" 
					v-bind:index="index"
					v-bind:key="sale.id"
				></sale>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Sale from './Sale.vue';

	export default {

		components: { Sale },

		data() {
			return {
				dataSet: false,
				sales: []
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
				return '/fetchSale/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.sales = data.data;
			}
		}
	}
</script>