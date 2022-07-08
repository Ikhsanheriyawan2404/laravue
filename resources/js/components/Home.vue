<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Dashboard",
        data() {
            return {
                name: null,
            }
        },
        created() {
            if (window.Laravel.user) {
                this.name = window.Laravel.user.name
            }
        },
        beforeRouteEnter(to, from, next) {
            if (!window.Laravel.isLoggedin) {
                window.location.href = "/login";
            }
            next();
        }
    }
</script>
