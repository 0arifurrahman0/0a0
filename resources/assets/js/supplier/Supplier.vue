<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ supplier.supplier_name }}</td>
		<td>{{ supplier.supplier_email }}</td>
		<td>{{ supplier.supplier_phone }}</td>
		<td>{{ supplier.supplier_company }}</td>
		<td>{{ supplier.supplier_address }}</td>
		<td>{{ supplier.supplier_description }}</td>
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
		props: ['supplier','index'],

		data() {
			return {
				edit: '/supplier/' + this.supplier.id + '/edit'
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
					axios.delete('/supplier/' + this.supplier.id);

					$(this.$el).fadeOut(300, () => {
						flash('Supplier has been deleted');
					});
				});
			}
		}
	}
</script>