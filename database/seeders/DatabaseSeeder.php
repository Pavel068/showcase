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
        ]);
    }
}
