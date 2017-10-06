<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ sale.product_name }}</td>
		<td>{{ sale.customer_name }}</td>
		<td>{{ sale.sale_invoiceNo }}</td>
		<td>{{ sale.sale_status }}</td>
		<td>{{ sale.sale_quantity }}</td>
		<td>{{ sale.sale_rate }}</td>
		<td>{{ sale.sale_total }}</td>
		<td>{{ sale.sale_date }}</td>
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
		props: ['sale','index'],

		data() {
			return {
				edit: '/sale/' + this.sale.id + '/edit'
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
					axios.delete('/sale/' + this.sale.id);

					$(this.$el).fadeOut(300, () => {
						flash('Sale has been deleted');
					});
				})
				
			}
		}
	}
</script>