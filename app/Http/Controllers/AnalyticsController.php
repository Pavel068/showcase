<?php

namespace App\Http\Controllers;

use App\Models\BalanceChanges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt-auth:' . $this->getGuardId());
    }

    public function systemAnalytics()
    {

    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerAnalytics(): \Illuminate\Http\JsonResponse
    {
        try {
            return $this->responseSuccess([
                'incomes' => BalanceChanges::selectRaw('SUM(amount) AS amount, DATE(created_at) AS date')
                    ->where([
                        'user_id' => $this->getGuard()->id(),
                        'type' => 'income'
                    ])
                    ->groupBy(DB::raw('DATE(created_at)'))
                    ->get(),
                'withdrawals' => BalanceChanges::selectRaw('SUM(amount) AS amount, DATE(created_at) AS date')
                    ->where([
                        'user_id' => $this->getGuard()->id(),
                        'type' => 'withdraw'
                    ])
                    ->groupBy(DB::raw('DATE(created_at)'))
                    ->get(),
            ]);
        } catch (\Exception $e) {
            return $this->responseError(['error' => 1], 400);
        }
    }
}
