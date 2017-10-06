<template>
	<div>
		<table v-if="categories.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:10%;">Sl</th>
					<th style="width:30%;">Category Name</th>
					<th style="width:50%;">Category Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<category 
					v-for="(category, index) in categories" 
					v-bind:category="category" 
					v-bind:index="index"
					v-bind:key="category.id"
				></category>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Category from './Category.vue';

	export default {

		components: { Category },

		data() {
			return {
				dataSet: false,
				categories: []
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
				return '/fetchCategory/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.categories = data.data;
			}
		}
	}
</script>