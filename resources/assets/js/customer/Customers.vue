<template>
	<div>
		<table v-if="customers.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:10%;">Sl</th>
					<th style="width:20%;">Customer Name</th>
					<th style="width:15%;">Customer Email</th>
					<th style="width:15%;">Customer Phone</th>
					<th style="width:15%;">Customer Address</th>
					<th style="width:15%;">Customer Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<customer 
					v-for="(customer, index) in customers" 
					v-bind:customer="customer" 
					v-bind:index="index"
					v-bind:key="customer.id"
				></customer>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Customer from './Customer.vue';

	export default {

		components: { Customer },

		data() {
			return {
				dataSet: false,
				customers: []
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
				return '/fetchCustomer/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.customers = data.data;
			}
		}
	}
</script>