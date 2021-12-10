<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @return Guard
     */
    protected function getGuard(): Guard
    {
        return \Illuminate\Support\Facades\Auth::guard($this->getGuardId());
    }

    /**
     * @return string
     */
    protected function getGuardId(): string
    {
        return 'api';
    }

    /**
     * @param mixed $data
     * @param int $status
     * @return JsonResponse
     */
    protected function responseSuccess($data, $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $data
        ], $status);
    }

    /**
     * @param mixed $error
     * @param int $status
     * @return JsonResponse
     */
    protected function responseError($error, $status = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'error' => $error
        ], $status);
    }
}
