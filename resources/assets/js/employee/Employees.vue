<template>
	<div>
		<table v-if="employees.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:2%;">Sl</th>
					<th style="width:10%;">First Name</th>
					<th style="width:10%;">Last Name</th>
					<th style="width:10%;">Email</th>
					<th style="width:10%;">Phone</th>
					<th style="width:5%;">Gender</th>
					<th style="width:10%;">National ID</th>                						<th style="width:10%;">Birth Day</th>
					<th style="width:13%;">Address</th>
					<th style="width:10%;">Salary</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<employee 
					v-for="(employee, index) in employees" 
					v-bind:employee="employee" 
					v-bind:index="index"
					v-bind:key="employee.id"
				></employee>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Employee from './Employee.vue';

	export default {

		components: { Employee },

		data() {
			return {
				dataSet: false,
				employees: []
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
				return '/fetchEmployee/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.employees = data.data;
			}
		}
	}
</script>