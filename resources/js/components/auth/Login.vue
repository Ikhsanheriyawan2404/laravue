<template>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Login
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control form-control-sm" v-model="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-control-sm" v-model="password">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary my-3" @click="handleSubmit">Login</button>
                        </form>
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
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios.post('api/login', {
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            console.log(response.data)
                            if (response.data.success) {
                                this.$router.go('/home')
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next('home');
        }
        next();
    }
}
</script>
