<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header text-white bg-primary">
                        Edit Produk
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateProduct">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-sm" v-model="product.name">
                            </div>
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" class="form-control form-control-sm" v-model="product.sku">
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
                product: {}
            }
        },
        created() {
            this.$axios('/sanctum/csrf-cookie').then(response => {
                this.$axios
                    .get(`/api/products/${this.$route.params.id}`)
                    .then((res) => {
                        this.product = res.data;
                    });
            });
        },
        methods: {
            updateProduct() {
                this.$axios('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .patch(`/api/products/${this.$route.params.id}`, this.product)
                        .then((res) => {
                            this.$router.push({ name: 'products' });
                        });
                });
            }
        }
    }
</script>
