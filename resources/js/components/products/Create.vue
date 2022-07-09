<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div v-for="(errorArray, idx) in errors" :key="idx">
                    <div v-for="(allErrors, idx) in errorArray" :key="idx">
                        <span class="text-danger">{{ allErrors }} </span>
                    </div>
                </div>

                <div class="card my-3">
                    <div class="card-header text-white bg-primary">
                        Tambah Produk
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addProduct">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-sm" v-model="product.name">
                            </div>
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" class="form-control form-control-sm" v-model="product.sku">
                                <div class="invalid-feedback" v-if="errors && errors.sku">
                                    {{ errors.sku[0] }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control form-control-sm" v-model="product.price">
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" class="form-control form-control-sm" v-model="product.stock">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" class="form-control form-control-sm" v-model="product.description">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary my-3">Simpan</button>
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
                product: {},
                errors: {}
            }
        },
        methods: {
            addProduct() {
                // e.preventDefault();
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .post('/api/products', this.product)
                        .then(response => {
                            this.$router.push({ name: 'products' });
                        })
                        .catch(e => {
                            if (e.response.status == 422) {
                                this.errors = e.response.data.errors;
                            }
                        })
                        .finally(() => this.loading = false);

                });
            },
        },
        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/";
            }
            next();
        }
    }
</script>
