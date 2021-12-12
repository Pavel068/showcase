<template>
    <div class="body-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <TopMenu/>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Настройки сервиса</div>
                        <div class="card-body">
                            <table class="table table-striped" v-if="systemSettings">
                                <tr>
                                    <th>Ключ</th>
                                    <th>Значение</th>
                                    <th>Мета</th>
                                </tr>
                                <tr v-for="setting in systemSettings.data">
                                    <td>{{ setting.key }}</td>
                                    <td>
                                        <input class="form-control" type="text" value="5" v-model="setting.value">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="" cols="30" rows="3">{{ setting.meta }}</textarea>
                                    </td>
                                </tr>
                            </table>

                            <button class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Аналитика сервиса</div>
                        <div class="card-body">
                            <table class="table table-striped" v-if="systemAnalytics">
                                <tr>
                                    <td>Кол-во пользователей</td>
                                    <td>{{ systemAnalytics.data.total_users }}</td>
                                </tr>
                                <tr>
                                    <td>Платных тарифов</td>
                                    <td>{{ systemAnalytics.data.partners }}</td>
                                </tr>
                                <tr>
                                    <td>Комиссия за неделю</td>
                                    <td>{{ systemAnalytics.data.tax_per_week }}</td>
                                </tr>
                                <tr>
                                    <td>Сумма выплат</td>
                                    <td>{{ systemAnalytics.data.withdrawal_amount }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TopMenu from "../components/TopMenu";

export default {
    name: "Admin",
    components: {TopMenu},
    data: () => {
        return {
            systemSettings: null,
            systemAnalytics: null,
            form: {}
        }
    },
    methods: {

    },
    async mounted() {
        await this.$store.dispatch('getSystemSettings');
        this.systemSettings = this.$store.getters.systemSettings;
        await this.$store.dispatch('getSystemAnalytics');
        this.systemAnalytics = this.$store.getters.systemAnalytics;
    }
}
</script>

<style scoped>

</style>
