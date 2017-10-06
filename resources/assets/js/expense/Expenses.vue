<template>
	<div>
		<table v-if="expenses.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:5%;">Sl</th>
					<th style="width:15%;">Payment Date</th>
					<th style="width:15%;">Payment To</th>
					<th style="width:15%;">Payment Type</th>
					<th style="width:15%;">Payment Account</th>
					<th style="width:10%;">Amount</th>
					<th style="width:15%;">Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<expense 
					v-for="(expense, index) in expenses" 
					v-bind:expense="expense" 
					v-bind:index="index"
					v-bind:key="expense.id"
				></expense>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Expense from './Expense.vue';

	export default {

		components: { Expense },

		data() {
			return {
				dataSet: false,
				expenses: []
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
				return '/fetchExpense/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.expenses = data.data;
			}
		}
	}
</script>