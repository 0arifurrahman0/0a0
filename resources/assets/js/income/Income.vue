<template>
	<tr>
		<td>{{ index+1 }}</td>
		<td>{{ income.income_paymentDate }}</td>
		<td>{{ income.income_paymentFrom }}</td>
		<td>{{ income.income_paymentType }}</td>
		<td>{{ income.income_paymentAccount }}</td>
		<td>{{ income.income_amount }}</td>
		<td>{{ income.income_details }}</td>
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
		props: ['income','index'],

		data() {
			return {
				edit: '/income/' + this.income.id + '/edit'
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
					axios.delete('/income/' + this.income.id);

					$(this.$el).fadeOut(300, () => {
						flash('Income has been deleted');
					});
				})
			}
		}
	}
</script>