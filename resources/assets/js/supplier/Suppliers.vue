<template>
	<div>
		<table v-if="suppliers.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:5%;">Sl</th>
					<th style="width:15%;">Name</th>
					<th style="width:10%;">Email</th>
					<th style="width:10%;">Phone</th>
					<th style="width:10%;">Company</th>
					<th style="width:20%;">Address</th>
					<th style="width:20%;">Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<supplier 
					v-for="(supplier, index) in suppliers" 
					v-bind:supplier="supplier" 
					v-bind:index="index"
					v-bind:key="supplier.id"
				></supplier>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Supplier from './Supplier.vue';

	export default {

		components: { Supplier },

		data() {
			return {
				dataSet: false,
				suppliers: []
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
				return '/fetchSupplier/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.suppliers = data.data;
			}
		}
	}
</script>