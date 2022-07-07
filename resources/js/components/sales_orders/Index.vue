<template>
    <div class="container">
        <h2 class="my-3">Data Penjualan</h2>
        <router-link to="/sales/create" class="btn btn-sm btn-primary mb-3">Tambah Penjualan</router-link>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kuantiti</th>
                <th>Tanggal</th>
                <th>Nama Pelanggan</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="sales_order in sales_orders" :key="sales_order.id">
                <td>{{ sales_order.id }}</td>
                <td>{{ sales_order.product.name }}</td>
                <td>{{ sales_order.qty }}</td>
                <td>{{ sales_order.date }}</td>
                <td>{{ sales_order.customer.name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'sales-edit', params: { id: sales_order.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                        <button class="btn btn-sm btn-danger" @click="deleteSalesOrder(sales_order.id)">Delete</button>
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
                sales_orders: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/sales_orders/')
                .then(response => {
                    this.sales_orders = response.data;
                });
        },
        methods: {
            deleteSalesOrder(id) {
                this.axios
                    .delete(`http://localhost:8000/api/sales_orders/${id}`)
                    .then(response => {
                        let i = this.sales_orders.map(data => data.id).indexOf(id);
                        this.sales_orders.splice(i, 1)
                    });
            }
        }
    }
</script>
