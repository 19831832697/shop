<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    //购物车
    public function cart(){
        $arr=DB::table('shop_cart')->
        $arr=[
            'goods_name'=>1,
            'goods_id'=>1,
            'user_id'=>1,
            'status'=>1,
            'buy_num'=>1,
            'create_time'=>time()
        ];
    }
}
