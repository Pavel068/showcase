<template>
    <div class="body-wrap">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-1">
                    <button class="btn btn-secondary back-button" @click="$router.push({name: 'Index'})">На главную</button>
                </div>
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">Авторизация</div>
                        <div class="card-body">
                            <form action="">
                                <label for="email">E-Mail</label>
                                <input type="text" class="form-control" id="email">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" id="password">

                                <button class="mt-3 btn btn-outline-primary">Войти</button>

                                <div class="mt-3 text-muted">
                                    Нет аккаунта? <router-link :to="{name: 'Signup'}">Зарегистрироваться</router-link>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login"
}
</script>

<style scoped>

</style>
