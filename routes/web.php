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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','Home\HomeController@index');


//商品详情
Route::get('/goods/goodslist','Goods\GoodsController@goodslist');
//购物车
Route::get('/cart','Cart\CartController@cart');
//生成订单
Route::post('pay','pay\PayController@pay');
//订单列表
Route::post('payShow','pay\PayController@payShow');