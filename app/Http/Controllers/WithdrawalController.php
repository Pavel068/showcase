<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WithdrawalController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt-auth:' . $this->getGuardId());
    }

    /**
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWithdrawals($user_id = null): \Illuminate\Http\JsonResponse
    {
        if ($user_id) {
            return $this->responseSuccess(Withdrawal::where(['user_id' => $this->getGuard()->id()])->get());
        } else {
            return $this->responseSuccess(Withdrawal::with('user')->get());
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function withdraw(): \Illuminate\Http\JsonResponse
    {
        try {
            $withdraw = Withdrawal::create([
                'user_id' => $this->getGuard()->id(),
                'amount' => \request()->post('amount')
            ]);

            return $this->responseSuccess($withdraw, 201);
        } catch (\Exception $e) {
            Log::error($e);
            return $this->responseError(['error' => 1]);
        }
    }

    public function cancelWithdraw($id)
    {

    }

    public function confirmWithdraw($id)
    {

    }

    public function rejectWithdraw($id)
    {

    }
}
