<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User_controller;
use App\Http\Controllers\Product_controller;
use App\Http\Controllers\Favorite_controller;
use App\Http\Controllers\Transaction_controller;
use App\Http\Controllers\Transaction_detail_controller;

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

Route::middleware(['cors'])->group(function () {
	Route::get('/user', [User_controller::class, 'index']);
	Route::get('/user/{user_id}', [User_controller::class, 'show']);
	Route::post('/user', [User_controller::class, 'store']);
	Route::put('/user/{user_id}', [User_controller::class, 'update']);
	Route::delete('/user/{user_id}', [User_controller::class, 'destroy']);

	Route::get('/product', [Product_controller::class, 'index']);
	Route::get('/product/{product_id}', [Product_controller::class, 'show']);
	Route::post('/product', [Product_controller::class, 'store']);
	Route::put('/product/{product_id}', [Product_controller::class, 'update']);
	Route::delete('/product/{product_id}', [Product_controller::class, 'destroy']);

	Route::get('/product/origin/{product_origin_category}', [Product_controller::class, 'showOrigin']);
	Route::get('/product/category/{product_category}', [Product_controller::class, 'showCategory']);
	Route::get('/product/name/{product_name}', [Product_controller::class, 'showName']);

	Route::get('/favorite', [Favorite_controller::class, 'index']);
	Route::get('/favorite/{favorite_id}', [Favorite_controller::class, 'show']);
	Route::post('/favorite', [Favorite_controller::class, 'store']);
	Route::put('/favorite/{favorite_id}', [Favorite_controller::class, 'update']);
	Route::delete('/favorite/{favorite_id}', [Favorite_controller::class, 'destroy']);

	Route::get('/transaction', [Transaction_controller::class, 'index']);
	Route::get('/transaction/{transaction_id}', [Transaction_controller::class, 'show']);
	Route::post('/transaction', [Transaction_controller::class, 'store']);
	Route::put('/transaction/{transaction_id}', [Transaction_controller::class, 'update']);
	Route::delete('/transaction/{transaction_id}', [Transaction_controller::class, 'destroy']);

	Route::get('/transaction_detail', [Transaction_detail_controller::class, 'index']);
	Route::get('/transaction_detail/{transaction_detail_id}', [Transaction_detail_controller::class, 'show']);
	Route::post('/transaction_detail', [Transaction_detail_controller::class, 'store']);
	Route::put('/transaction_detail/{transaction_detail_id}', [Transaction_detail_controller::class, 'update']);
	Route::delete('/transaction_detail/{transaction_detail_id}', [Transaction_detail_controller::class, 'destroy']);
});