<template>
    <div class="body-wrap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <TopMenu/>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Вывод денег</div>
                        <div class="card-body">
                            <form action="">
                                <label for="amount">Сумма вывода</label>
                                <input type="number" class="form-control" id="amount" v-model="amount">
                                <label for="card_number">Номер карты</label>
                                <input type="text" class="form-control" id="card_number" v-model="card_number">
                                <button class="mt-1 btn btn-primary" @click="withdraw">Вывести</button>
                            </form>
                            <div class="mt-3">
                                <router-link :to="{name: 'Profile'}">Назад</router-link>
                            </div>
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
    name: "Withdrawal",
    components: {TopMenu},
    data: () => {
        return {
            card_number: null,
            amount: 100,
        }
    },
    methods: {
        async withdraw(e) {
            e.preventDefault();
            await this.$store.dispatch('makeWithdrawal', {
                amount: this.amount,
                card_number: this.card_number
            });
            await this.$router.push({name: 'Profile'});
        }
    }
}
</script>

<style scoped>

</style>
