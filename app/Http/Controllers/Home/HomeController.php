<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
class HomeController extends Controller
{
    //
    public function index(){
        $where=[
            'goods_status'=>1,
            'goods_new'=>1
        ];
        $goodsInfo=GoodsModel::where($where)->get();
        $goodswhere=[
            'goods_status'=>1,
        ];
        $goods=GoodsModel::orderBy('goods_salenum','desc')->paginate(4);
        return view('home.index',['goodsInfo'=>$goodsInfo,'goods'=>$goods]);
    }

}
