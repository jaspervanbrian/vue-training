<template>
	<div class="list-group">
		<a href="#!" v-for="friend in friends" class="list-group-item list-group-item-action flex-column align-items-start">
			<div class="d-flex w-100 justify-content-between" v-if="editing.hasOwnProperty(friend.id)">
				<input type="text" v-model="editing[friend.id]" class="form-control">
				<button class="btn btn-info" @click="updateFriend(friend.id, editing[friend.id])">Save</button>
				<button class="btn btn-danger" @click="cancelEdit(friend.id)">Cancel</button>
			</div>
			<div class="d-flex w-100 justify-content-between" v-else>
				<h5 class="mb-1" v-text="friend.name"></h5>
				<div>
					<button class="btn btn-outline-info" @click="editFriend(friend.id, friend.name)">Edit</button>
					<button class="btn btn-outline-danger" @click="deleteFriend(friend.id)">Remove</button>
				</div>
			</div>
			<small v-text="fromNow(friend.created_at)"></small>
		</a>
	</div>
</template>

<script>
	export default {
		props: {
			friends: {
				type: Array,
				required: true,
			},
		},
		data() {
			return {
				editing: [],
			}
		},
		methods: {
			editFriend(id, name) {
				this.$set(this.editing, id, name);
			},
			cancelEdit(id) {
				this.$delete(this.editing, id);
			},
			updateFriend(id, name) {
				axios.post(`http://127.0.0.1:8000/friends/${id}/update`, {
					name,
				})
				.then((response) => {
					this.$delete(this.editing, id);
					this.$emit("done");
				})
				.catch((response) => {
					console.log(response);
				});
			},
			deleteFriend(id) {
				axios.post(`http://127.0.0.1:8000/friends/${id}/delete`)
				.then((response) => {
					this.$emit("done");
				})
				.catch((response) => {
					console.log(response);
				});
			},
			fromNow(date) {
				return moment(date).fromNow();
			}
		}
	}
</script>