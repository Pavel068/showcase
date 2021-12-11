<template>
    <div class="body-wrap">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-1">
                    <button class="btn btn-secondary back-button" @click="$router.push({name: 'Index'})">На главную</button>
                </div>
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">Регистрация</div>
                        <div class="card-body">
                            <form action="">
                                <label for="name">ФИО</label>
                                <input type="text" class="form-control" id="name" v-model="form.name">
                                <label for="email">E-Mail</label>
                                <input type="text" class="form-control" id="email" v-model="form.email">
                                <label for="tariff">Тариф</label>
                                <select name="tariff" id="tariff" class="form-control" v-model="form.tariff">
                                    <option value="free">Бесплатный</option>
                                    <option value="paid">$10/месяц</option>
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
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Signup",
    data: () => {
        return {
            form: {
                name: null,
                email: null,
                tariff: 'free',
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
