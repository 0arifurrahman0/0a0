<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ customer.customer_name }}</td>
		<td>{{ customer.customer_email }}</td>
		<td>{{ customer.customer_phone }}</td>
		<td>{{ customer.customer_address }}</td>
		<td>{{ customer.customer_description }}</td>
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
		props: ['customer','index'],

		data() {
			return {
				edit: '/customer/' + this.customer.id + '/edit'
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
					axios.delete('/warehouse/' + this.warehouse.id);

					$(this.$el).fadeOut(300, () => {
						flash('Warehouse has been deleted');
					});
				})
			}
		}
	}
</script>