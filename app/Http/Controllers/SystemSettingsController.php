<?php

namespace App\Http\Controllers;

use App\Models\SystemSettings;
use App\Services\QRService;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SystemSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt-auth:' . $this->getGuardId());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->responseSuccess(SystemSettings::all());
    }

    public function saveSettings(Request $request)
    {
        $data = $request->post();
        foreach ($data as $item) {
            SystemSettings::where(['key' => $item['key']])
                ->update([
                    'value' => $item['value'],
                    'meta' => $item['meta']
                ]);
        }
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getQRCodeSVG($user_id)
    {
        $string = QRService::generate($user_id);
        return QrCode::encoding('UTF-8')->size(250)->generate($string);
    }
}
