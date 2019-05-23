<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
class GoodsController extends Controller
{
    //商品详情
    public function goodslist(Request $request){
            $id=$request->input('goods_id');
            $where=[
                'goods_id'=>$id
            ];
            $res=GoodsModel::where($where)->first();
            //dd($id);
            return view('goods.goodslist',['res'=>$res]);
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
