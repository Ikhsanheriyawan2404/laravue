<template>
    <div class="container">
        <h2 class="my-3">Data Produk</h2>
        <router-link to="/products/create" class="btn btn-sm btn-primary mb-3">Tambah Produk</router-link>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.id }}</td>
                <td>{{ product.name }}</td>
                <td>{{ product.sku }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.stock }}</td>
                <td>{{ product.description }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'product-edit', params: { id: product.id }}" class="btn btn-sm btn-primary">Edit</router-link>
                        <button class="btn btn-sm btn-danger" @click="deleteProduct(product.id)">Delete</button>
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
                products: []
            }
        },
        created() {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.get('/api/products/')
                    .then(response => {
                        this.products = response.data;
                    });
        });
        },
        methods: {
            deleteProduct(id) {
                this.$axios
                    .delete(`/api/products/${id}`)
                    .then(response => {
                        let i = this.products.map(data => data.id).indexOf(id);
                        this.products.splice(i, 1)
                    });
            }
        }
    }
</script>
