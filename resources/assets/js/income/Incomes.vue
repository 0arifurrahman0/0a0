<template>
	<div>
		<table v-if="incomes.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:5%;">Sl</th>
					<th style="width:15%;">Payment Date</th>
					<th style="width:15%;">Payment From</th>
					<th style="width:15%;">Payment Type</th>
					<th style="width:15%;">Payment Account</th>
					<th style="width:10%;">Amount</th>
					<th style="width:15%;">Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<income 
					v-for="(income, index) in incomes" 
					v-bind:income="income" 
					v-bind:index="index"
					v-bind:key="income.id"
				></income>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Income from './Income.vue';

	export default {

		components: { Income },

		data() {
			return {
				dataSet: false,
				incomes: []
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
				return '/fetchIncome/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.incomes = data.data;
			}
		}
	}
</script>