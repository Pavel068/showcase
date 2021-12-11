<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/auth/register', [Controllers\AuthController::class, 'register']);
Route::post('/auth/login', [Controllers\AuthController::class, 'login']);
Route::get('/auth/me', [Controllers\AuthController::class, 'getMe']);
Route::delete('/auth/logout', [Controllers\AuthController::class, 'logout']);

Route::get('/system-settings', [Controllers\SystemSettingsController::class, 'index']);
Route::get('/system-settings/customer-qr/{user_id}', [Controllers\SystemSettingsController::class, 'getQRCodeSVG']);

Route::post('/payments/payment_callback', [Controllers\BalanceChangesController::class, 'paymentCallback']);
