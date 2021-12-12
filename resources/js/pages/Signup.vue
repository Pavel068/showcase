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
                        <div class="card-header">Регистрация</div>
                        <div class="card-body">
                            <form action="">
                                <label for="name">ФИО</label>
                                <input type="text" class="form-control" id="name" v-model="form.name">
                                <label for="email">E-Mail</label>
                                <input type="text" class="form-control" id="email" v-model="form.email">
                                <label for="tariff">Тариф</label>
                                <select name="tariff" id="tariff" class="form-control" v-model="form.role">
                                    <option value="customer">Бесплатный</option>
                                    <option value="partner">$10/месяц</option>
                                </select>
                                <label for="password">Пароль</label>
                                <input type="password" class="form-control" id="password" v-model="form.password">
                                <label for="password_repeat">Повторите пароль</label>
                                <input type="password" class="form-control" id="password_repeat" v-model="form.password_repeat">

                                <button class="mt-3 btn btn-outline-primary" :disabled="isPasswordsNotEqual" @click="signup">Отправить</button>

                                <div class="mt-3 text-danger" v-if="errors">Ошибка заполнения формы</div>

                                <div class="mt-3 text-muted">
                                    Уже есть аккаунт? <router-link :to="{name: 'Login'}">Войти</router-link>
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
    name: "Signup",
    components: {TopMenu},
    data: () => {
        return {
            form: {
                name: null,
                email: null,
                role: 'customer',
                password: null,
                password_repeat: null
            },
            errors: null
        }
    },
    computed: {
        isPasswordsNotEqual() {
            return this.form.password && this.form.password_repeat && this.form.password !== this.form.password_repeat;
        }
    },
    methods: {
        async signup(e) {
            e.preventDefault();
            try {
                await this.$store.dispatch('register', this.form);
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
