<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\OrderController;

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

Route::post('add-friend',[ChatController::class, 'addfriend']);
Route::get('friendsList/{id}',[ChatController::class, 'friendsList']);
Route::get('friendlist/friendsList2/{id}',[ChatController::class, 'friendsListUser']);
Route::get('getOrderConversation/{id}',[OrderController::class, 'getConversation']);
Route::post('singleChat',[ChatController::class, 'singleChat']);
Route::post('chat/send-message',[ChatController::class, 'send']);
Route::get('friendData/{id}',[ChatController::class, 'friendData']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
