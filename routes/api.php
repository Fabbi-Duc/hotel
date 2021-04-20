<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoomController;
use Illuminate\Support\Facades\Route;

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

Route::post('/sign-in', [AuthController::class, 'signIn'])->name('signIn');
Route::post('sign-up', [AuthController::class, 'signUp'])->name('signUp');
Route::get('auth/google/url', [AuthController::class, 'loginUrl']);
Route::get('auth/google/callback', [AuthController::class, 'loginCallback']);
Route::get('/send-mail', [AuthController::class, 'sendMail'])->name('sendMail');
Route::get('/send-multi-mail', [AuthController::class, 'sendMultiMail'])->name('sendMultiMail');
Route::middleware('auth:api')->group(function () {
    Route::get('account', [AuthController::class, 'account'])->name('account');
    Route::prefix("users")->group(function () {
        Route::get("/", [UserController::class, 'index']);
    });

    Route::prefix('notifications')->group(function () {
        Route::post('save-device-token', [NotificationController::class, 'saveDeviceToken'])->name('saveDeviceToken');
        Route::post('send-notification', [NotificationController::class, 'sendNotification'])->name('sendNotification');
        Route::post('send-notification-firebase', [NotificationController::class, 'sendNotificationFirebase'])->name('sendNotificationFirebase');
    });
});

Route::get('/users/list', [UserController::class, 'getListUsers'])->name('getListUsers');
Route::get('/qr-code', [UserController::class, 'sendMail'])->name('sendMailQr');
Route::post('/room-code', [RoomController::class, 'getCodeRoom'])->name('getRoomCode');
