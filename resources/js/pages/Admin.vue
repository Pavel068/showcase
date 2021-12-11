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
                            <table class="table table-striped">
                                <tr>
                                    <th>Ключ</th>
                                    <th>Значение</th>
                                    <th>Мета</th>
                                </tr>
                                <tr>
                                    <td>Комиссия сервиса (бесплатный тариф) (%)</td>
                                    <td>
                                        <input class="form-control" type="text" value="5">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="" cols="30" rows="3"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Комиссия сервиса (платный тариф) (%)</td>
                                    <td>
                                        <input class="form-control" type="text" value="5">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="" cols="30" rows="3"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Начисления от рефералов (%)</td>
                                    <td>
                                        <input class="form-control" type="text" value="5">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="" cols="30" rows="3"></textarea>
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
                            <table class="table table-striped">
                                <tr>
                                    <td>Кол-во пользователей</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>Платных тарифов</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>Комиссия за неделю</td>
                                    <td>$10.246</td>
                                </tr>
                                <tr>
                                    <td>Сумма выплат</td>
                                    <td>$10.246</td>
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
}
</script>

<style scoped>

</style>
