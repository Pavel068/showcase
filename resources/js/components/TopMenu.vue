<template>
    <nav class="navbar navbar-light bg-light justify-content-between">
        <a class="navbar-brand">Дай-На-Чай</a>
        <form class="form-inline">
            <a class="btn btn-outline-info my-2 my-sm-0" @click="logout">Выйти</a>
        </form>
    </nav>
</template>

<script>
export default {
    name: "TopMenu",
    methods: {
        async logout() {
            await this.$store.dispatch('logout');
            await this.$router.push({name: 'Index'});
        }
    }
}
</script>

<style scoped>

</style>
