<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                        <h5>{{ message }}</h5>
                        <input type="text" v-model="message" class="form-control">
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
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
