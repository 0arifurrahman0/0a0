<template>
	<tr>
		<td v-text="index+1"></td>
		<td v-text="subcategory.subcategory_name"></td>
		<td v-text="subcategory.category_name"></td>
		<td v-text="subcategory.subcategory_details"></td>
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
		props: ['subcategory','index'],

		data() {
			return {
				edit: '/subcategory/' + this.subcategory.id + '/edit'
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
					axios.delete('/subcategory/' + this.subcategory.id);

					$(this.$el).fadeOut(300, () => {
						flash('Sub Category has been deleted');
					})
				});
			}
		}
	}
</script>