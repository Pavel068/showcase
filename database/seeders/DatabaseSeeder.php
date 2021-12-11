<?php

namespace Database\Seeders;

use App\Models\SystemSettings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        SystemSettings::insert([
            [
                'key' => 'Name',
                'value' => 'ООО "Три кита"',
                'meta' => 'Наименование компании'
            ],
            [
                'key' => 'PersonalAcc',
                'value' => '40702810138250123017',
                'meta' => 'Расчетный счет'
            ],
            [
                'key' => 'BankName',
                'value' => 'ОАО "Банк"',
                'meta' => 'Наименование банка'
            ],
            [
                'key' => 'BIC',
                'value' => '044525225',
                'meta' => 'БИК'
            ],
            [
                'key' => 'CorrespAcc',
                'value' => '301018104000000000225',
                'meta' => 'Корреспондентский счет'
            ],
            [
                'key' => 'Purpose',
                'value' => 'ID=1',
                'meta' => 'Цель оплаты (идентификатор пользователя, которому происходит оплата)'
            ],
            [
                'key' => 'PayeeINN',
                'value' => '7710140679',
                'meta' => 'ИНН Получателя платежа'
            ],
            [
                'key' => 'KPP',
                'value' => '773401001',
                'meta' => 'КПП'
            ],
            [
                'key' => 'tax_free_tariff',
                'value' => '5',
                'meta' => 'Комиссия сервиса в % (бесплатный тариф)'
            ],
            [
                'key' => 'tax_paid_tariff',
                'value' => '2.5',
                'meta' => 'Комиссия сервиса в % (платный тариф)'
            ],
            [
                'key' => 'referral_tax',
                'value' => '0.5',
                'meta' => 'Отчисления от рефералов в %'
            ],
        ]);
    }
}
