<?php

use Illuminate\Http\Request;
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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Login route
 Route::post('login','Api\Auth\LoginController@Login')->name('login');

// users route
Route::apiResource('users','API\User\UserController');

Route::middleware('auth:api')->group(function () {
    
    //product routes
    Route::apiResource('products','API\Product\ProductController');

    //media route
    Route::apiResource('media','Api\Media\MediaController');

    //shift route
    Route::apiResource('shift','Api\Shift\ShiftController');

    //order route
    Route::apiResource('order','Api\Order\OrderController');

    //order products route
    Route::apiResource('order_products','Api\Order\OrderProductsController');

    //payment route
    Route::apiResource('payment','Api\Payment\PaymentController');

 });



