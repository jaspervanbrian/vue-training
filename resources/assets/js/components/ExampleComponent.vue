<template>
    <div class="container">
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
                    <div class="card-header" :title="title">Users</div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="user in users" v-text="user"></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" @keydown.enter="addUser" placeholder="Name" v-model="newUser">
                            </div>
                            <div class="col-4">
                                <button @click="addUser" class="btn btn-primary">Add User</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                message: "Hello World",
                title: "Users set in Vue (this title too)",
                newUser: "",
                users: ["John", "Jane", "Lorem Ipsum"],
                alerts: [
                    { "Primary": "alert alert-primary" },
                    { "Secondary": "alert alert-secondary" },
                    { "Informative": "alert alert-info" },
                    { "Success": "alert alert-success" },
                    { "Warning": "alert alert-warning" },
                    { "Danger": "alert alert-danger" },
                    { "Light": "alert alert-light" },
                    { "Dark": "alert alert-dark" },
                ],
            }
        },
        methods: {
            addUser() {
                if (this.newUser.trim() !== "") {
                    this.users.push(this.newUser);
                    this.newUser = "";
                }
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
        }
    }
</script>
