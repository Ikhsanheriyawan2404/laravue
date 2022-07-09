<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header text-white bg-primary">
                        Edit Produk
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateSalesOrder">
                            <div class="form-group">
                                <label>Produk</label>
                                <select class="form-control form-control-sm" v-model="sales_order.product_id">
                                    <option :value="null" selected disabled>Pilih Produk</option>
                                    <option v-for="product in products" :value="product.id" v-text="product.name"></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pelanggan</label>
                                <select class="form-control form-control-sm" v-model="sales_order.customer_id">
                                    <option :value="null" selected disabled>Pilih Pelanggan</option>
                                    <option v-for="customer in customers" :value="customer.id" v-text="customer.name"></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control form-control-sm" v-model="sales_order.date">
                            </div>
                            <div class="form-group">
                                <label>Kuantiti</label>
                                <input type="number" class="form-control form-control-sm" v-model="sales_order.qty">
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
                sales_order: {},
                customers: [],
                products: [],
            }
        },
        created() {
            this.fetchCustomer();
            this.fetchProduct();
            this.$axios('/sanctum/csrf-cookie').then(response => {
                this.$axios
                    .get(`/api/sales_orders/${this.$route.params.id}`)
                    .then((res) => {
                        this.sales_order = res.data;
                    });
            });
        },
        methods: {
            fetchCustomer() {
                this.$axios('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .get('/api/customers')
                        .then(response => {
                            this.customers = response.data;
                        });
                });
            },
            fetchProduct() {
                this.$axios('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .get('/api/products')
                        .then(response => {
                            this.products = response.data;
                        });
                });
            },
            updateSalesOrder() {
                this.$axios('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .patch(`/api/sales_orders/${this.$route.params.id}`, this.sales_order)
                        .then((res) => {
                            this.$router.push({ name: 'sales_orders' });
                        });
                });
            }
        }
    }
</script>
