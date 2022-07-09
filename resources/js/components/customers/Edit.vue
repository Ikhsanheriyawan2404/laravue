<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card my-3">
                    <div class="card-header text-white bg-primary">
                        Edit Produk
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="updateCustomer">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control form-control-sm" v-model="customer.name">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control form-control-sm" v-model="customer.email">
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control form-control-sm" v-model="customer.phone_number">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control form-control-sm" v-model="customer.address">
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
                customer: {}
            }
        },
        created() {
            this.$axios('/sanctum/csrf-cookie').then(response => {
                this.$axios
                    .get(`/api/customers/${this.$route.params.id}`)
                    .then((res) => {
                        this.customer = res.data;
                    });
            });
        },
        methods: {
            updateCustomer() {
                this.$axios('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .patch(`/api/customers/${this.$route.params.id}`, this.customer)
                        .then((res) => {
                            this.$router.push({ name: 'customers' });
                        });
                });
            }
        }
    }
</script>
