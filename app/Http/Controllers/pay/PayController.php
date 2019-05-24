<?php

namespace App\Http\Controllers\pay;

use App\Model\PayModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
    /**
     * 订单，订单详情入库
     * @param Request $request
     * @return false|string
     */
    public function pay(Request $request){
        $user_id=$_COOKIE['user_id'];
        $goods_id=$request->input('goods_id');
        $order_amount=$request->input('order_amount');
        if(empty($user_id)){
            $res=[
                'code'=>40020,
                'msg'=>'您还没有登录，请先去登录！'
            ];
            return json_encode($res,JSON_UNESCAPED_UNICODE);
        }
        $id=rtrim($goods_id,',');
        $goodsId=explode(',',$id);
        if(empty($id)){
            $res=[
                'code'=>40020,
                'msg'=>'请至少选择一件商品去结算！'
            ];
            return json_encode($res,JSON_UNESCAPED_UNICODE);
        }
        //生成
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
                $res=[
                    'code'=>200,
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
    public function paylist(){
        return view('pay.paylist');
    }

    /**
     * 展示订单
     * @param Request $request
     * @return false|string
     */
    public function payShow(Request $request){
        $order_no=$request->input('order_no');
        $user_id=$_COOKIE['user_id'];
        $where=[
            'order_no'=>$order_no,
            'user_id'=>$user_id
        ];
        $arrInfo=DB::table('shop_order_detail')->where($where)->get();
        return json_encode($arrInfo,JSON_UNESCAPED_UNICODE);
    }
}
