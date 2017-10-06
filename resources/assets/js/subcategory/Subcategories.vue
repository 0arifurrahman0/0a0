<template>
	<div>
		<table v-if="subcategories.length > 0" class="table table-bordered table-striped table-hover">
			<thead>
				<tr class="info">
					<th style="width:10%;">Sl</th>
					<th style="width:25%;">Sub Category Name</th>
					<th style="width:25%;">Category Name</th>
					<th style="width:30%;">Category Details</th>
					<th style="width:10%;">Action</th>
				</tr>
			</thead>
			<tbody>
				<subcategory 
					v-for="(subcategory, index) in subcategories" 
					:subcategory="subcategory" 
					:index="index"
					:key="subcategory.id"
				></subcategory>
			</tbody>
		</table>

		<paginator :dataSet="dataSet" @changed="fetch"></paginator>

	</div>
</template>

<script>
	import Subcategory from './Subcategory.vue';

	export default {

		components: { Subcategory },

		data() {
			return {
				dataSet: false,
				subcategories: []
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
				return '/fetchSubcategory/?page=' + page;
			},

			refresh({data}) {
				this.dataSet = data;
				this.subcategories = data.data;
			}
		}
	}
</script>