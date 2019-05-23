<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
class HomeController extends Controller
{
    //
    public function index(){
//        echo "aa";
        return view('home.index');
    }
    //最新商品
    public function goodsnew(){
        $where=[
            'goods_status'=>1,
            'goods_new'=>1
        ];
        $goodsInfo=GoodsModel::where($where)->all();
        dd($goodsInfo);
    }
}
