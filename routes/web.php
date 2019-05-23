<?php


//Route::get('/', function () {
//    return view('welcome');
//});

<<<<<<< HEAD

//个人中心
Route::get('/','Home\HomeController@index');

//
=======
Route::get('/','Home\HomeController@index');


//商品详情
Route::get('/goods/goodslist','Goods\GoodsController@goodslist');
>>>>>>> lian
