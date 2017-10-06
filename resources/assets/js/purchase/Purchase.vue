<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ purchase.product_name }}</td>
		<td>{{ purchase.supplier_name }}</td>
		<td>{{ purchase.purchase_invoiceNo }}</td>
		<td>{{ purchase.purchase_status }}</td>
		<td>{{ purchase.purchase_quantity }}</td>
		<td>{{ purchase.purchase_rate }}</td>
		<td>{{ purchase.purchase_total }}</td>
		<td>{{ purchase.purchase_date }}</td>
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
		props: ['purchase','index'],

		data() {
			return {
				edit: '/purchase/' + this.purchase.id + '/edit'
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
					axios.delete('/purchase/' + this.purchase.id);

					$(this.$el).fadeOut(300, () => {
						flash('Purchase has been deleted');
					});
				})
				
			}
		}
	}
</script>