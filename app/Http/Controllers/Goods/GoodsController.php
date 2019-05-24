<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\DB;
class GoodsController extends Controller
{
    //商品详情
    public function goodslist(Request $request){
            $id=$request->input('goods_id');
            $where=[
                'goods_id'=>$id
            ];
            $res=GoodsModel::where($where)->first();
            //购物车
            $car=DB::table('shop_cart')->where($where)->first();

            $user_id=session('user_id');
            if(empty($user_id)){
                $data=DB::table('shop_goods')->where($where)->first();
                $is_tell=$data->is_tell;
                $is_tell+=1;
                DB::table('shop_goods')->where($where)->update(['is_tell'=>$is_tell]);
            }else{
                $where=[
                    'goods_id'=>$id,
                    'user_id'=>$user_id
                ];
                $arrInfo=DB::table('history')->where($where)->first();
                if($arrInfo){
                    DB::table('history')->where($where)->update(['create_time'=>time()]);
                }else{
                    $dataInfo=[
                        'user_id'=>$user_id,
                        'goods_id'=>$id,
                        'create_time'=>time()
                    ];
                    DB::table('history')->insert($dataInfo);
                }

            }
            return view('goods.goodslist',['res'=>$res,'car'=>$car]);
    }
    //商品列表
    public function goodsInfo(){
        $where=[
            'goods_status'=>1
        ];
        $goodsInfo=GoodsModel::where($where)->paginate(4);
        return view('goods.goods',['goodsInfo'=>$goodsInfo]);
    }
}
