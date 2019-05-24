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

//注册页面
Route::get('register','User\UserController@register');
//注册
Route::post('registerDo','User\UserController@registerDo');
//登录页面
Route::get('login','User\UserController@login');
//登录
Route::post('loginDo','User\UserController@loginDo');

//商品详情
Route::get('/goods/goodslist','Goods\GoodsController@goodslist');
Route::get('/goods/goodsinfo','Goods\GoodsController@goodsInfo');
//购物车
Route::get('/cart','Cart\CartController@cart');
//购物车展示
Route::get('/cartlist','Cart\CartController@cartlist');
ROute::get('/del','Cart\CartController@del');
//加减号
Route::get('/add','Cart\CartController@add');
Route::get('/subtract','Cart\CartController@subtract');

//加入,展示，删除收藏
Route::get('/col/add','Collect\ColController@add');
Route::get('/col/list','Collect\ColController@list');
Route::get('/col/del','Collect\ColController@del');
//点击去结算生成订单
Route::post('pay','pay\PayController@pay');
//订单列表
Route::post('payShow','pay\PayController@payShow');
//去支付
Route::get('z_pay','pay\MoneyController@z_pay');
Route::post('notify','alipay\AlipayController@notify');//异步回调
Route::get('aliReturn','alipay\AlipayController@aliReturn');//同步回调