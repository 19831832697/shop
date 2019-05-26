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
//忘记密码进入手机号验证页面
Route::get('password', 'User\UserController@password');
//验证码发送
Route::post('code', 'User\UserController@code');
//验证
Route::post('checkId', 'User\UserController@checkId');
//进入修改页面
Route::get('pwdShow', 'User\UserController@pwdShow');
//修改密码成功
Route::post('pwdChange', 'User\UserController@pwdChange');
//个人中心页面
Route::get('mycenter', 'User\UserController@mycenter');
//注销登录
Route::get('loginOut', 'User\UserController@loginOut');
//切换用户
Route::get('userChange', 'User\UserController@userChange');



//商品详情
Route::get('/goods/goodslist','Goods\GoodsController@goodslist');
Route::get('/goods/goodsinfo','Goods\GoodsController@goodsInfo');
//购物车
Route::get('/cart','Cart\CartController@cart');
//加减号
Route::get('/add','Cart\CartController@add');
Route::get('/subtract','Cart\CartController@subtract');
//购物车展示
Route::get('/cartlist','Cart\CartController@cartlist');
//生成订单
Route::post('pay','pay\PayController@pay');
//订单列表
Route::post('payShow','pay\PayController@payShow');
//去支付
Route::get('z_pay','pay\MoneyController@z_pay');
Route::post('notify','alipay\AlipayController@notify');//异步回调
Route::get('aliReturn','alipay\AlipayController@aliReturn');//同步回调