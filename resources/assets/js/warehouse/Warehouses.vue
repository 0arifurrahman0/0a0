<template>
	<div>
		<table v-if="warehouses.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:10%;">Sl</th>
					<th style="width:30%;">Warehouse Name</th>
					<th style="width:50%;">Warehouse Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<warehouse 
					v-for="(warehouse, index) in warehouses" 
					v-bind:warehouse="warehouse" 
					v-bind:index="index"
					v-bind:key="warehouse.id"
				></warehouse>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Warehouse from './Warehouse.vue';

	export default {

		components: { Warehouse },

		data() {
			return {
				dataSet: false,
				warehouses: []
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
				return '/fetchWarehouse/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.warehouses = data.data;
			}
		}
	}
</script>