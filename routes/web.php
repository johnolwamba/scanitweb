<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/testmpesa',  [
    'as' => 'testmpesa', 'uses' => 'HomeController@testmpesa'
]);


Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout',  [
        'as' => 'logout', 'uses' => 'HomeController@logout'
    ]);

    Route::get('/home',  [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);

    Route::get('/',  [
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);

    //customers
    Route::get('/customers',  [
        'as' => 'customers', 'uses' => 'CustomersController@getCustomers'
    ]);

    Route::get('/customer/{id}',  [
        'as' => 'customer', 'uses' => 'CustomersController@getCustomer'
    ]);

    Route::post('/customer/{id}/delete', [
        'as' => 'customer.delete', 'uses' => 'CustomersController@deleteCustomer'
    ]);

    Route::post('/customer/{id}/update', [
        'as' => 'customer.update', 'uses' => 'CustomersController@updateCustomer'
    ]);



    //products
    Route::get('/products',  [
        'as' => 'products', 'uses' => 'ProductsController@getProducts'
    ]);

    Route::get('/product/{id}',  [
        'as' => 'product', 'uses' => 'ProductsController@getProduct'
    ]);

    Route::post('/product-create', [
        'as' => 'product.create', 'uses' => 'ProductsController@addProductPost'
    ]);

    Route::post('/product/{id}/delete', [
        'as' => 'product.delete', 'uses' => 'ProductsController@deleteProduct'
    ]);

    Route::post('/product/{id}/update', [
        'as' => 'product.update', 'uses' => 'ProductsController@updateProduct'
    ]);




    //payments
    Route::get('/payments',  [
        'as' => 'payments', 'uses' => 'PaymentsController@getPayments'
    ]);
    Route::get('/payment/{id}',  [
        'as' => 'payment', 'uses' => 'PaymentsController@getPayment'
    ]);


    //orders
    Route::get('/orders',  [
        'as' => 'orders', 'uses' => 'OrdersController@getOrders'
    ]);

    Route::get('/order/{id}',  [
        'as' => 'order', 'uses' => 'OrdersController@getOrder'
    ]);




    //scans
    Route::get('/scans',  [
        'as' => 'scans', 'uses' => 'HomeController@getScans'
    ]);

    //reports
    Route::get('/reports',  [
        'as' => 'reports', 'uses' => 'HomeController@getReports'
    ]);

    //stations
    Route::get('/stations',  [
        'as' => 'stations', 'uses' => 'HomeController@getStations'
    ]);

    Route::get('/station/{id}',  [
        'as' => 'station', 'uses' => 'HomeController@getStation'
    ]);

    Route::post('/station-create', [
        'as' => 'station.create', 'uses' => 'HomeController@addStationPost'
    ]);

    Route::post('/station/{id}/delete', [
        'as' => 'station.delete', 'uses' => 'HomeController@deleteStation'
    ]);

    Route::post('/station/{id}/update', [
        'as' => 'station.update', 'uses' => 'HomeController@updateStation'
    ]);



    //users
    Route::get('/users',  [
        'as' => 'users', 'uses' => 'HomeController@getUsers'
    ]);


});