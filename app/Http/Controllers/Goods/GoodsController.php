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
}
