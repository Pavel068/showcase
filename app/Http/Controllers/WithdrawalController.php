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

    protected function changeWithdrawStatus($id, $status)
    {
        $withdraw = Withdrawal::where(['id' => $id])->first();

        if (!$withdraw) {
            return $this->responseError(['error' => 1]);
        }

        $withdraw->status = $status;
        $withdraw->save();
        $withdraw->refresh();

        return $withdraw;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelWithdraw($id): \Illuminate\Http\JsonResponse
    {
        return $this->changeWithdrawStatus($id, 'cancelled');
    }

    /**
     * @param $id
     * @return Withdrawal|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|object
     */
    public function confirmWithdraw($id)
    {
        return $this->changeWithdrawStatus($id, 'confirmed');
    }

    /**
     * @param $id
     * @return Withdrawal|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|\Illuminate\Http\JsonResponse|object
     */
    public function rejectWithdraw($id)
    {
        return $this->changeWithdrawStatus($id, 'rejected');
    }
}
