<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\OrderController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('orders',                [OrderController::class, 'getOrders']);
Route::post('orders/add',           [OrderController::class, 'addOrder']);
Route::post('orders/edit/{id}',     [OrderController::class, 'editOrder']);
Route::get('orders/show/{id}',      [OrderController::class, 'showOrder']);
