<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>
                    <div class="card-body">
                        I'm an example component.
                        <h5>{{ message }}</h5>
                        <input type="text" v-model="message" class="form-control" v-focus>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-8">
                <div class="card card-default">
                    <div class="card-header" :title="title">
                        Users
                    </div>
                    <div class="card-body">
                        <button @click="changeButton" :class="button">Toggle me!</button>
                        <friend :friends="friends" @done="getFriends"></friend>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" @keydown.enter="addFriend" placeholder="Name" v-model="newFriend">
                            </div>
                            <div class="col-3">
                                <button @click="addFriend" class="btn btn-primary btn-block">Add User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Friend from './Friend.vue';
    export default {
        data() {
            return {
                message: "Hello World",
                title: "Friends set in Vue (this title too)",
                newFriend: "",
                friends: [],
                buttons: [
                    "btn btn-block btn-primary",
                    "btn btn-block btn-secondary",
                    "btn btn-block btn-info",
                    "btn btn-block btn-success",
                    "btn btn-block btn-warning",
                    "btn btn-block btn-danger",
                    "btn btn-block btn-light",
                    "btn btn-block btn-dark",
                    "btn btn-block btn-outline-primary",
                    "btn btn-block btn-outline-secondary",
                    "btn btn-block btn-outline-info",
                    "btn btn-block btn-outline-success",
                    "btn btn-block btn-outline-warning",
                    "btn btn-block btn-outline-danger",
                    "btn btn-block btn-outline-light",
                    "btn btn-block btn-outline-dark",
                ],
                button: "",
                buttonIndex: 0,
            }
        },
        created() {
            this.getFriends();
            this.button = this.buttons[this.buttonIndex];
        },
        methods: {
            getFriends() {
                axios.get("http://127.0.0.1:8000/friends")
                .then((response) => {
                    this.friends = response.data;
                })
                .catch((response) => {
                    console.log(response);
                });
            },
            addFriend() {
                if (this.newFriend.trim() !== "") {
                    axios.post("http://127.0.0.1:8000/friends", {
                        name: this.newFriend,
                    })
                    .then((response) => {
                        this.friends = response.data;
                        this.newFriend = "";
                    })
                    .catch((response) => {
                        console.log(response.data);
                    });
                }
            },
            changeButton() {
                if (this.buttonIndex === this.buttons.length - 1) {
                    this.buttonIndex = 0;
                } else {
                    this.buttonIndex++;
                }
                this.button = this.buttons[this.buttonIndex];
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        directives: {
            focus: {
                inserted(el) {
                    el.focus()
                }
            }
        },
        components: {
            Friend
        }
    }
</script>
