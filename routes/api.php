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
Route::post('/login-customer', [AuthController::class, 'loginCustomer'])->name('loginCustomer');
Route::post('sign-up', [AuthController::class, 'signUp'])->name('signUp');
Route::get('customer', [AuthController::class, 'accountCustomer'])->name('accountCustomer');
Route::get('auth/google/url', [AuthController::class, 'loginUrl']);
Route::get('auth/google/callback', [AuthController::class, 'loginCallback']);
Route::get('/send-mail', [AuthController::class, 'sendMail'])->name('sendMail');
Route::get('/send-multi-mail', [AuthController::class, 'sendMultiMail'])->name('sendMultiMail');
Route::middleware('auth:api')->group(function () {
    Route::get('account', [AuthController::class, 'account'])->name('account');
    Route::prefix("users")->group(function () {
        Route::get("/", [UserController::class, 'index']);
    });
});

Route::post('/notifications/save-device-token', [NotificationController::class, 'saveDeviceToken'])->name('saveDeviceToken');
Route::post('/notifications/send-notification', [NotificationController::class, 'sendNotification'])->name('sendNotification');
Route::post('/notifications/send-notification-firebase', [NotificationController::class, 'sendNotificationFirebase'])->name('sendNotificationFirebase');
Route::get('/notifications/{id}', [NotificationController::class, 'getNotification'])->name('getNotification');
Route::get('/update-notifications/{id}', [NotificationController::class, 'updateNotification'])->name('updateNotification');
Route::get('/users/list', [UserController::class, 'getListUsers'])->name('getListUsers');
Route::delete('/user/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
Route::get('/user/detail/{id}', [UserController::class, 'getInfoUser'])->name('getInfoUser');
Route::post('/user/create', [UserController::class, 'createUser'])->name('createUser');
Route::post('/user/update', [UserController::class, 'updateUser'])->name('updateUser');
Route::post('/food/create', [UserController::class, 'createFood'])->name('createFood');
Route::post('/food/update', [UserController::class, 'updateFood'])->name('updateFood');
Route::get('/food/{id}', [UserController::class, 'getInfoFood'])->name('getInfoFood');
Route::delete('/food/delete/{id}', [UserController::class, 'deleteFood'])->name('deleteFood');
Route::get('/food-list', [UserController::class, 'listFood'])->name('listFood');
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
Route::post('/register-customer', [CustomerController::class, 'registerCustomer'])->name('registerCustomer');
Route::get('/customer/list', [CustomerController::class, 'getCustomersList'])->name('getCustomersList');
Route::get('/rooms', [RoomController::class, 'getRoomFloor'])->name('getRoomFloor');
Route::post('/customer/book-room', [CustomerController::class, 'bookRoom'])->name('bookRoom');
Route::get('/room-customer/{id}', [CustomerController::class, 'getInfoRoomCustomer'])->name('getInfoRoomCustomer');
Route::get('/customer/{id}', [CustomerController::class, 'getInfoCustomer'])->name('getInfoCustomer');
Route::post('/customer/{room_customer_id}', [CustomerController::class, 'updateBookRoom'])->name('updateBookRoom');
Route::get('/pay/{id}', [CustomerController::class, 'pay'])->name('pay');
Route::post('/food', [CustomerController::class, 'food'])->name('food');
Route::get('/list/food', [CustomerController::class, 'getFood'])->name('getFood');
Route::get('/list-food-order/{room_id}', [CustomerController::class, 'getListFoodOrder'])->name('getListFoodOrder');
Route::get('/list-order', [CustomerController::class, 'getListOrder'])->name('getListOrder');
Route::get('/update-order/{room_serivce_food_id}', [CustomerController::class, 'updateListFood'])->name('updateListFood');
Route::get('/book-room-online', [CustomerController::class, 'bookRoomOnline'])->name('bookRoomOnline');
Route::get('/list-clean', [CustomerController::class, 'listClean'])->name('listClean');
Route::get('/update-clean/{room_id}', [CustomerController::class, 'updateClean'])->name('updateClean');
Route::post('/list-park', [CustomerController::class, 'listPark'])->name('listPark');
Route::post('/update-park', [CustomerController::class, 'updatePark'])->name('updatePark');
Route::get('/park-id', [CustomerController::class, 'getParkId'])->name('getParkId');
Route::post('/create-park', [UserController::class, 'createPark'])->name('createPark');
