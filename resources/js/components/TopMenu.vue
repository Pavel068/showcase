<template>
    <nav class="navbar navbar-light bg-light justify-content-between fixed-top">
        <a class="navbar-brand" @click="$router.push({name: 'Index'})">Дай-На-Чай</a>
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
    nav, nav * {
        font-size: 14px;
    }

    a {
        cursor: pointer;
    }
</style>
