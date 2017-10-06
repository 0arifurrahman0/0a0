<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ category.category_name }}</td>
		<td>{{ category.category_details }}</td>
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
		props: ['category','index'],

		data() {
			return {
				edit: '/category/' + this.category.id + '/edit'
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
					axios.delete('/category/' + this.category.id);

					$(this.$el).fadeOut(300, () => {
						flash('Category has been deleted');
					});
				});
			}
		}
	}
</script>