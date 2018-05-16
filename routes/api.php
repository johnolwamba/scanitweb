<?php

use Illuminate\Http\Request;

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

Route::post('/login', [
    'uses'=>'MobileAPI@login'
]);

Route::post('/register', [
    'uses'=>'MobileAPI@register'
]);

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('/logout', [
        'uses'=>'MobileAPI@logout'
    ]);

    Route::get('/me',[
        'uses'=>'MobileAPI@getAuthenticatedUser'
    ]);

    Route::get('/promotions',[
        'uses'=>'MobileAPI@getPromotions'
    ]);

    Route::get('/products',[
        'uses'=>'MobileAPI@getProducts'
    ]);

    Route::get('/checkproduct/{id}',[
        'uses'=>'MobileAPI@checkProduct'
    ]);

    Route::get('/product/{id}', [
        'uses'=>'MobileAPI@getProduct'
    ]);

    Route::post('/scanproduct',[
        'uses'=>'MobileAPI@scanProduct'
    ]);


    Route::get('/orders', [
        'uses'=>'MobileAPI@myOrders'
    ]);

    Route::get('/order/{id}', [
        'uses'=>'MobileAPI@getOrder'
    ]);

    Route::get('/order-delete/{id}', [
        'uses'=>'MobileAPI@removeOrder'
    ]);

    Route::get('/product-delete/{id}', [
        'uses'=>'MobileAPI@removeProduct'
    ]);

    Route::post('/create-order', [
        'uses'=>'MobileAPI@createOrder'
    ]);

    Route::post('/checkout',[
        'uses'=>'MobileAPI@checkout'
    ]);

    Route::post('process-payment',[
        'uses'=>'MobileAPI@processPayment'
    ]);

});
