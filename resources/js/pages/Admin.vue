<template>
    <div class="body-wrap">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-1">
                    <button class="btn btn-secondary back-button" @click="$router.push({name: 'Index'})">На главную</button>
                </div>
                <div class="col-md-11">
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
                                        <textarea class="form-control" name="" cols="30" rows="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Комиссия сервиса (платный тариф) (%)</td>
                                    <td>
                                        <input class="form-control" type="text" value="5">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="" cols="30" rows="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Начисления от рефералов (%)</td>
                                    <td>
                                        <input class="form-control" type="text" value="5">
                                    </td>
                                    <td>
                                        <textarea class="form-control" name="" cols="30" rows="10"></textarea>
                                    </td>
                                </tr>
                            </table>

                            <button class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Admin"
}
</script>

<style scoped>

</style>
