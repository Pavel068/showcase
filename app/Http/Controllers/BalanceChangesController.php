<?php

namespace App\Http\Controllers;

use App\Models\BalanceChanges;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BalanceChangesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt-auth:' . $this->getGuardId())->except(['paymentCallback']);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function paymentCallback(): \Illuminate\Http\JsonResponse
    {
        $data = \request()->post();
        $user_id = $data['ID'];
        $amount = $data['amount'];

        try {
            $change = BalanceChanges::create([
                'user_id' => $user_id,
                'type' => 'income',
                'amount' => $amount
            ]);

            $user = User::where(['id' => $user_id])->first();
            $user->balance += $amount;
            $user->save();

            return $this->responseSuccess($change, 201);
        } catch (\Exception $e) {
            Log::error($e);
            return $this->responseError(['error' => 1], 400);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function withdraw(): \Illuminate\Http\JsonResponse
    {
        $data = \request()->post();
        $user_id = $this->getGuard()->id();
        $wallet = $data['wallet'];
        $amount = $data['amount'];

        try {
            $change = BalanceChanges::create([
                'user_id' => $user_id,
                'type' => 'withdraw',
                'amount' => $amount
            ]);

            $user = User::where(['id' => $user_id])->first();
            $user->balance -= $amount;
            $user->save();

            return $this->responseSuccess($change, 201);
        } catch (\Exception $e) {
            Log::error($e);
            return $this->responseError(['error' => 1], 400);
        }
    }
}
