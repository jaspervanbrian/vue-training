<template>
	<div class="modal is-active">
		<div class="modal-background"></div>
		<div class="modal-content">
			<div class="box">
				<p>{{ name }}</p>
				<small v-text="fromNow(created_at.date)"></small>
				<p>
					<small>{{ "Updated: " + fromNow(updated_at.date) }}</small>
				</p>
			</div>
		</div>
		<button class="modal-close is-large" aria-label="close" @click="close"></button>
	</div>
</template>

<script>
	export default {
		props: {
			name: {
				type: String,
			},
			created_at: {
				type: Object,
			},
			updated_at: {
				type: Object,
			}
		},
		methods: {
			close(){
				this.$emit("closemodal");
			},
			fromNow(date) {
				return moment.utc(date, "YYYY-MM-DD h:mm:ss").fromNow();
			}
		}
	}
</script>

<style lang="scss" scoped>
	@import "~bulma/sass/utilities/_all.sass";
	@import "~bulma/sass/elements/box.sass";
	@import "~bulma/sass/components/modal.sass";
</style>