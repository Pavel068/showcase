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

                            <button class="btn btn-success" @click="saveSettings">Сохранить</button>
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

                    <div class="card mt-3">
                        <div class="card-header">Запросы на вывод</div>
                        <div class="card-body" v-if="withdrawals">
                            <table class="table table-striped">
                                <tr>
                                    <th>Пользователь</th>
                                    <th>Сумма</th>
                                    <th>Дата</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                <tr v-for="item in withdrawals.data">
                                    <td>{{ item.user.name }} ({{ item.user.id }})</td>
                                    <td>{{ item.amount }}</td>
                                    <td>{{ Date.parse(item.created_at).toString('yyyy-MM-dd') }}</td>
                                    <td>{{ item.status }}</td>
                                    <td class="actions">
                                        <template v-if="item.status === 'new'">
                                            <button class="btn btn-success" @click="confirm(item.id)">Одобрить</button>
                                            <button class="btn btn-danger" @click="reject(item.id)">Отклонить</button>
                                        </template>
                                    </td>
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
import {mapActions} from "vuex";

export default {
    name: "Admin",
    components: {TopMenu},
    data: () => {
        return {
            systemAnalytics: null,
        }
    },
    computed: {
        withdrawals() {
            return this.$store.getters.Withdrawals;
        },
        systemSettings() {
            return this.$store.getters.systemSettings;
        }
    },
    methods: {
        ...mapActions(['confirmWithdrawal', 'rejectWithdrawal']),
        async confirm(id) {
            await this.confirmWithdrawal(id);
            await this.$store.dispatch('getWithdrawals');
        },
        async reject() {
            await this.rejectWithdrawal(id);
            await this.$store.dispatch('getWithdrawals');
        },
        async saveSettings() {
            await this.$store.dispatch('saveSystemSettings', this.systemSettings.data);
            await this.$store.dispatch('getSystemSettings');
        }
    },
    async mounted() {
        await this.$store.dispatch('getSystemSettings');

        await this.$store.dispatch('getSystemAnalytics');
        this.systemAnalytics = this.$store.getters.systemAnalytics;
        await this.$store.dispatch('getWithdrawals');
    }
}
</script>

<style scoped>
    .actions button {
        width: 100%;
    }
</style>
