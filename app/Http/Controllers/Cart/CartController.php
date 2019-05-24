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
        $user_id=$_COOKIE['user_id'];
        $where=[
            'goods_id'=>$goods_id,
            'user_id'=>$user_id
        ];
        $catr=DB::table('shop_cart')->where($where)->first();
        $arr=DB::table('shop_goods')->where(['goods_id'=>$goods_id])->first();
//        dd($arr);
        if(empty($catr)){
            $info=[
                'goods_name'=>$arr->goods_name,
                'goods_id'=>$arr->goods_id,
                'buy_num'=>$buy_num,
                'status'=>1,
                'user_id'=>$user_id,
                'create_time'=>time()
            ];
            $catr_info=DB::table('shop_cart')->insert($info);
        }else{
            $arr_num=[
                'buy_num'=>$catr->buy_num+$buy_num
            ];
            if($arr->goods_num>=$arr_num['buy_num']){
                $catr_info=DB::table('shop_cart')->where($where)->update($arr_num);
            }else{
                return $res=[
                    'ser'=>2,
                    'msg'=>"购买数量超过库存"
                ];
            };
        }
      if($catr_info){
          return $res=[
              'ser'=>0,
              'msg'=>"加入购物车成功"
          ];
      }else{
          return $res=[
              'ser'=>1,
              'msg'=>"加入购物车失败"
          ];
      }
    }

    //购物车加减
    public function add(){
        $goods_id=$_GET['goods_id'];
        $buy_num=$_GET['buy_num'];
        $catr=DB::table('shop_cart')->where(['goods_id'=>$goods_id])->first();
        if($catr){
            $catr_info=DB::table('shop_cart')->where(['goods_id'=>$goods_id])->update(['buy_num'=>$buy_num]);
        }
    }

    //购物车列表
    public function cartlist(){
        $where=[
            'user_id'=>$_COOKIE['user_id'],
        ];
        $arr=DB::table('shop_cart')->get()->toArray();
        $goods_id=array_column($arr,'goods_id');
        $goods_info=DB::table('shop_goods')->wherein('goods_id',$goods_id)->get();
//        dd($goods_info);
//        $info=DB::table('shop_cart')->join("shop_goods","shop_cart.goods_id"."="."shop_goods.goods_id")->get();
        $info=DB::table('shop_cart')
            ->join('shop_goods', 'shop_cart.goods_id', '=', 'shop_goods.goods_id')
            ->where($where)
            ->get();
        return view('goods/cartlist',['arr'=>$info]);
    }

    //购物车删除
    public function subtract(){
        $goods_id=$_GET['goods_id'];
        $where=[
            'goods_id'=>$goods_id,
            'user_id'=>$_COOKIE['user_id'],
        ];
        $catr_info=DB::table('shop_cart')->where($where)->delete();
        if($catr_info){
            echo "删除成功";
        }else{
            echo "删除失败";
        }
    }
}
