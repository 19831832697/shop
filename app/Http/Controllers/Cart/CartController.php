<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    //购物车
    public function cart(){
        $goods_id=$_GET['goods_id'];
        $buy_num=$_GET['buy_num'];
        $arr=DB::table('shop_goods')->where(['goods_id'=>$goods_id])->first();
        $info=[
            'goods_name'=>$arr->goods_name,
            'goods_id'=>$arr->goods_id,
            'buy_num'=>$buy_num,
            'status'=>1,
            'create_time'=>time()
        ];
        $catr_info=DB::table('shop_cart')->insert($info);
        dd($catr_info);
//
    }
}
