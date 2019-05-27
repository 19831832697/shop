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

//关于我们
Route::get('/aboutus', 'Aboutus\AboutusController@aboutus');

//个人中心页面
Route::get('mycenter', 'User\UserController@mycenter');
//注销登录
Route::get('loginOut', 'User\UserController@loginOut');
//切换用户
Route::get('userChange', 'User\UserController@userChange');


//商品详情
Route::get('/goods/goodslist','Goods\GoodsController@goodslist');
Route::get('/goods/goodsinfo','Goods\GoodsController@goodsInfo');
//浏览记录
Route::get('historyShow','Goods\GoodsController@historyShow');
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
Route::get('/col/dela','Collect\ColController@dela');
Route::get('/goods/aaa','Goods\GoodsController@aaa');

//点击去结算生成订单
Route::post('/pay','pay\PayController@pay');
Route::get('/paylist','pay\PayController@paylist');

//支付宝支付
Route::get('z_pay','pay\MoneyController@z_pay');
Route::post('notify','pay\MoneyController@notify');//异步回调
Route::get('aliReturn','pay\MoneyController@aliReturn');//同步回调

//微信支付
Route::get('wx_text','Wei\WeiPayController@text');
Route::post('wx_notify','Wei\WeiPayController@notify');
Route::get('wx_success','Wei\WeiPayController@success');

Route::get('/add','Auths\AuthsController@add');
Route::get('/wxauth','Auths\AuthsController@wxauth');