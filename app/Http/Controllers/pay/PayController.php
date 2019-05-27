<?php

namespace App\Http\Controllers\pay;

use App\Model\PayModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class PayController extends Controller
{
    /**
     * 订单，订单详情入库
     * @param Request $request
     * @return false|string
     */
    public function pay(Request $request){
        $user_id = $request->cookie('user_id');
        $goods_id=$request->input('goods_id');
        $order_amount=$request->input('order_amount');
        if(empty($user_id)){
            $res=[
                'code'=>40025,
                'msg'=>'您还没有登录，请先去登录！'
            ];
            return json_encode($res,JSON_UNESCAPED_UNICODE);
        }
        $id=rtrim($goods_id,',');
        $goodsId=explode(',',$id);
        $where=[
            'user_id'=>$user_id,
        ];
        if(empty($id)){
            $res=[
                'code'=>40020,
                'msg'=>'请至少选择一件商品去结算！'
            ];
            return json_encode($res,JSON_UNESCAPED_UNICODE);
        }
        //生成订单
        $order_no=date('YmdHis',time()).rand(1000,9999);
        $dataInfo=[
            'order_no'=>$order_no,
            'order_amount'=>$order_amount,
            'user_id'=>$user_id
        ];
        $order_id=PayModel::insertGetId($dataInfo);
        //订单详情
        $arrInfo=DB::table('shop_goods')
            ->join('shop_cart','shop_goods.goods_id','=','shop_cart.goods_id')
            ->whereIn('shop_goods.goods_id',$goodsId)
            ->get()->toArray();
        if(!empty($arrInfo)){
            foreach ($arrInfo as $k=>$v){
                $arr=[
                    'goods_id'=>$v->goods_id,
                    'user_id'=>$user_id,
                    'order_no'=>$order_no,
                    'goods_name'=>$v->goods_name,
                    'goods_price'=>$v->goods_price,
                    'order_id'=>$order_id,
                    'buy_num'=>$v->buy_num,
                    'ctime'=>time(),
                ];
                $orderInfo=DB::table('shop_order_detail')->insert($arr);
            }
            if($orderInfo){
                $updateInfo=[
                    'status'=>2
                ];
                //修改购物车状态
                DB::table('shop_cart')->where($where)->whereIn('goods_id',$goodsId)->update($updateInfo);
                $res=[
                    'code'=>200,
                    'order_no'=>$order_no
                ];
                return json_encode($res, JSON_UNESCAPED_UNICODE);
            }
        }else {
             $res = [
                 'code' => 40020,
                 'msg' => '没有此商品'
             ];
             return json_encode($res, JSON_UNESCAPED_UNICODE);
        }
    }

    /**
     * 订单页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paylist(Request $request){
        $order_no=$request->input('order_no');
        $user_id = $request->cookie('user_id');
        $where=[
            'shop_order_detail.order_no'=>$order_no,
            'shop_order_detail.user_id'=>$user_id
        ];
        $arrInfo=DB::table('shop_order_detail')
            ->join('shop_goods','shop_goods.goods_id','=','shop_order_detail.goods_id')
            ->join('shop_order','shop_order.order_id','=','shop_order_detail.order_id')
            ->where($where)->get();
        $arr=json_decode($arrInfo,true);
//        var_dump($arr);die;
        return view('pay/paylist',['arr'=>$arr,'order_no'=>$order_no]);
    }
}
