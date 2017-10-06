<template>
	<input type="file" accept="image/*" @change="onChange">
</template>

<script>

	export default {
		methods: {
			onChange(e) {
				//console.log(e.target.files[0]);
				if (! e.target.files.length) return;

				let file = e.target.files[0];

				let reader = new FileReader();

				reader.readAsDataURL(file);

				reader.onload = (e) => {
					let src = e.target.result;
					this.$emit('loaded', { src });
				}
			}
		}
	}
</script>