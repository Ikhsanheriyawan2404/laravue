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
                        Tambah Pelanggan
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addCustomer">
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
                customer: {},
                errors: {}
            }
        },
        methods: {
            addCustomer() {
                this.$axios.get('/sanctum/csrf-cookie').then(response => {
                    this.$axios
                        .post('/api/customers', this.customer)
                        .then(response => (
                            this.$router.push({ name: 'customers' })
                        ))
                        .catch(e => {
                            if (e.response.status == 422) {
                                this.errors = e.response.data.errors;
                            }
                        })
                        .finally(() => this.loading = false)
                });
            }
        }
    }
</script>
