<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ employee.employee_fname }}</td>
		<td>{{ employee.employee_lname }}</td>
		<td>{{ employee.employee_email }}</td>
		<td>{{ employee.employee_phone }}</td>
		<td>{{ employee.employee_gender }}</td>
		<td>{{ employee.employee_nid }}</td>
		<td>{{ employee.employee_birthday }}</td>
		<td>{{ employee.employee_address }}</td>
		<td>{{ employee.employee_salary }}</td>
		<td>
			<a :href="edit" class="btn btn-xs btn-success">
				<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
			</a>

			<button @click="destroy" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		</td>
	</tr>
</template>

<script>
	export default{
		props: ['employee','index'],

		data() {
			return {
				edit: '/employee/' + this.employee.id + '/edit'
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
					axios.delete('/employee/' + this.employee.id);

					$(this.$el).fadeOut(300, () => {
						flash('Employee has been deleted');
					});
				});
			}
		}
	}
</script>