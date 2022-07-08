<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">APP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" v-if="isLoggedIn">
                        <li class="nav-item active">
                            <router-link to="/" class="nav-link">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/products" class="nav-item nav-link">Produk</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/customers" class="nav-item nav-link">Pelanggan</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/sales" class="nav-item nav-link">Penjualan</router-link>
                        </li>
                        <a class="nav-item nav-link" style="cursor: pointer;" v-on:click="logout">Logout</a>
                    </ul>
                    <ul class="navbar-nav" v-else="isLoggedIn">
                        <li class="nav-item">
                            <router-link to="/login" class="nav-item nav-link">Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/register" class="nav-item nav-link">Register</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                isLoggedIn: false,
            }
        },
        created() {
            if (window.Laravel.isLoggedin) {
                this.isLoggedIn = true
            }
        },
        method: {
            logout(e) {
                console.log('ss')
                e.preventDefault()
                this.axios.get('/sanctum/csrf-cookie').then(response => {
                    this.axios.post('/api/logout')
                        .then(response => {
                            if (response.data.success) {
                                window.location.href = "/login"
                            } else {
                                console.log(response)
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                })
            }
        }
    }
</script>
