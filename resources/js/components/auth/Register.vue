<template>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="alert alert-danger" role="alert" v-if="error !== null">
                    {{ error }}
                </div>

                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Register
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control-sm" v-model="name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control form-control-sm" v-model="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control form-control-sm" v-model="password">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary my-3" @click="handleSubmit">Daftar</button>
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
            name: "",
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        handleSubmit(e) {
            e.preventDefault()
            if (this.password.length > 0) {
                axios.get('/sanctum/csrf-cookie').then(response => {
                    axios.post('api/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password
                    })
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/login"
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
