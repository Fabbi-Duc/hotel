<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\CustomerController;
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
Route::delete('/room/delete', [RoomController::class, 'deleteRoom'])->name('deleteRoom');
Route::get('/rooms/list', [RoomController::class, 'getListRooms'])->name('getListRooms');
Route::get('/qr-code', [UserController::class, 'sendMail'])->name('sendMailQr');
Route::get('/get-roomType', [RoomController::class, 'getRoomType'])->name('getRoomType');
Route::post('/room-code', [RoomController::class, 'getCodeRoom'])->name('getRoomCode');
Route::get('/room/{id}', [RoomController::class, 'getInfoRoom'])->name('getInfoRoom');
Route::post('/room/create', [RoomController::class, 'createRoom'])->name('createRoom');
Route::get('/room', [RoomController::class, 'getNameRoom'])->name('getNameRoom');
Route::post('/room/update', [RoomController::class, 'updateRoom'])->name('updateRoom');
Route::get('/load/comment', [RoomController::class, 'loadComment'])->name('loadComment');
Route::get('/customer/list', [CustomerController::class, 'getCustomersList'])->name('getCustomersList');
Route::get('/rooms', [RoomController::class, 'getRoomFloor'])->name('getRoomFloor');
Route::post('/customer/book-room', [CustomerController::class, 'bookRoom'])->name('bookRoom');
Route::get('/room-customer/{id}', [CustomerController::class, 'getInfoRoomCustomer'])->name('getInfoRoomCustomer');
Route::get('/customer/{id}', [CustomerController::class, 'getInfoCustomer'])->name('getInfoCustomer');
Route::post('/customer/{room_customer_id}', [CustomerController::class, 'updateBookRoom'])->name('updateBookRoom');
Route::get('/pay/{id}', [CustomerController::class, 'pay'])->name('pay');