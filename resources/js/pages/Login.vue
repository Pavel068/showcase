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
                                <input type="text" class="form-control" id="email" v-model="form.email">
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" v-model="form.password">

                                <button class="mt-3 btn btn-outline-primary" @click="login">Войти</button>

                                <div class="mt-3 text-danger" v-if="errors">Неверный E-Mail или пароль</div>

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
    name: "Login",
    data: () => {
        return {
            form: {
                email: null,
                password: null
            },
            errors: null
        }
    },
    methods: {
        async login(e) {
            e.preventDefault();
            try {
                await this.$store.dispatch('login', this.form);
                await this.$router.push({name: 'Profile'});
            } catch (e) {
                this.errors = e.errors;
            }
        }
    }
}
</script>

<style scoped>

</style>
