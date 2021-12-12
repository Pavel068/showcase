<template>
    <div class="body-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <TopMenu/>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
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
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</template>

<script>
import TopMenu from "../components/TopMenu";

export default {
    name: "Login",
    components: {TopMenu},
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
    },
    async mounted() {
        try {
            await this.$store.dispatch('getMe');
            if (this.$store.getters.authorizedUser) {
                await this.$router.push({name: 'Profile'});
            }
        } catch (e) {

        }
    }
}
</script>

<style scoped>

</style>
