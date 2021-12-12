<template>
    <div class="body-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <TopMenu/>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Профиль</div>
                        <div class="card-body" v-if="userData">
                            <p class="lead">{{ userData.name }}</p>
                            <p>Баланс: <span>{{ userData.balance || 0 }}</span> <router-link :to="{name: 'Withdraw'}">Вывести</router-link></p>
                            <p>Тариф: <span>{{ userData.role === 'partner' ? '$10/месяц' : 'Бесплатный' }}</span></p>
                            <p>Комиссия: <span>5%</span></p>
                            <p>ДФА: <a href="">Включить</a></p>
                            <p>Рефералы: <span>0</span></p>
                            <p>Реферальная ссылка: <br> <span>https://127.0.0.1/signup/?parent_id={{ userData.id }}</span></p>
                            <p>QR-код: <br/>
                                <span v-html="QRCode"></span>
                            </p>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">Выводы денег</div>
                        <div class="card-body" v-if="withdrawals">
                            <table class="table">
                                <tr>
                                    <th>Дата</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                <tr v-for="item in withdrawals.data">
                                    <td>{{ Date.parse(item.created_at).toString('yyyy-MM-dd') }}</td>
                                    <td>{{ item.amount }}</td>
                                    <td>{{ item.status }}</td>
                                    <td>
                                        <button v-if="item.status === 'new'" class="btn btn-danger">Отменить</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">Аналитика</div>
                        <div class="card-body">
                            <div class="card-header">Поступления</div>
                            <div class="card-body" v-if="analytics">
                                <LineChart :chart-data="analytics.data.incomes" :height="300" :width="600"/>
                            </div>
                            <div class="card-header">Выводы</div>
                            <div class="card-body" v-if="analytics">
                                <LineChart :chart-data="analytics.data.withdrawals" :height="300" :width="600"/>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">Конструктор визитки</div>
                        <div class="card-body">
                            <img style="width: 100%" src="images/visit-example.png" alt="">
                            <button class="mt-3 btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import TopMenu from "../components/TopMenu";
import LineChart from "../components/chart/LineChart";

export default {
    name: "Profile",
    components: {TopMenu, LineChart},
    data: () => {
        return {
            userData: null,
            QRCode: null,
            analytics: null,
            withdrawals: null
        }
    },
    async mounted() {
        await this.$store.dispatch('getMe');
        this.userData = this.$store.getters.authorizedUser;
        await this.$store.dispatch('getCustomerQR', this.userData.id);
        this.QRCode = this.$store.getters.customerQR
        await this.$store.dispatch('getCustomerAnalytics');
        this.analytics = this.$store.getters.customerAnalytics;
        await this.$store.dispatch('getWithdrawals', this.userData.id);
        this.withdrawals = this.$store.getters.Withdrawals;
    }
}
</script>

<style scoped>

</style>
