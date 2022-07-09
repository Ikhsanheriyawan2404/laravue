<template>
    <div class="container">
        <h2 class="my-3">Data Pelanggan</h2>
        <router-link to="/customers/create" class="btn btn-sm btn-primary mb-3">Tambah Pelanggan</router-link>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="customer in customers" :key="customer.id">
                <td>{{ customer.id }}</td>
                <td>{{ customer.name }}</td>
                <td>{{ customer.email }}</td>
                <td>{{ customer.phone_number }}</td>
                <td>{{ customer.address }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'customer-edit', params: { id: customer.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                        <button class="btn btn-sm btn-danger" @click="deleteCustomer(customer.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                customers: []
            }
        },
        created() {
            this.$axios('/sanctum/csrf-cookie').then(response => {
                this.$axios
                    .get('/api/customers/')
                    .then(response => {
                        this.customers = response.data;
                    });
            });
        },
        methods: {
            deleteCustomer(id) {
                this.$axios
                    .delete(`/api/customers/${id}`)
                    .then(response => {
                        let i = this.customers.map(data => data.id).indexOf(id);
                        this.customers.splice(i, 1)
                    });
            }
        }
    }
</script>
