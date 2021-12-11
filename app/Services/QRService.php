<?php

namespace App\Services;

use App\Models\SystemSettings;

class QRService
{
    /**
     * https://files.stroyinf.ru/Data/574/57470.pdf
     * @param $user_id
     * @return string
     */
    public static function generate($user_id): string
    {
        $qr_pieces = [
            'ST00011', // Начало строки для кодирования
            'Name=' . SystemSettings::where(['key' => 'Name'])->first()->value,
            'PersonalAcc=' . SystemSettings::where(['key' => 'PersonalAcc'])->first()->value,
            'BankName=' . SystemSettings::where(['key' => 'BankName'])->first()->value,
            'BIC=' . SystemSettings::where(['key' => 'BIC'])->first()->value,
            'CorrespAcc=' . SystemSettings::where(['key' => 'CorrespAcc'])->first()->value,
            'Purpose=' . $user_id ? $user_id : SystemSettings::where(['key' => 'Purpose'])->first()->value
        ];

        return implode('|', $qr_pieces);
    }
}
