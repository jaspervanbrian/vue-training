<template>
	<div class="modal is-active">
		<div class="modal-background"></div>
		<div class="modal-content">
			<div class="box">
				<p>Hello</p>
			</div>
		</div>
		<button class="modal-close is-large" aria-label="close" @click="close"></button>
	</div>
</template>

<script>
	export default {
		methods: {
			close(){
				this.$emit("close");
			}
		}
	}
</script>

<style lang="scss">
	@import "~bulma/sass/utilities/_all.sass";
	@import "~bulma/sass/components/modal.sass";
</style>