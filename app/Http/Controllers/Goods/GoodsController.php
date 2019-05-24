<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\DB;
use App\Model\PraiseModel;
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
            //浏览历史
//            $user_id=session('user_id');
            $user_id=1;
            if(empty($user_id)){
                echo 7777;
                $data=DB::table('shop_goods')->where($where)->first();
                if($data){
                    $is_tell=$data->is_tell;
                    $is_tell+=1;
                    DB::table('shop_goods')->where($where)->update(['is_tell'=>$is_tell]);
                }else{
                    $res=[
                        'code'=>40030,
                        'msg'=>'没有此商品'
                    ];
                    return json_encode($res,JSON_UNESCAPED_UNICODE);
                }
            }else{
                $whereInfo=[
                    'goods_id'=>$id,
                    'user_id'=>$user_id
                ];
                $arrInfo=DB::table('history')->where($whereInfo)->first();
                if($arrInfo){
                   DB::table('history')->where($whereInfo)->update(['create_time'=>time()]);
                }else{
                    $dataInfo=[
                        'user_id'=>$user_id,
                        'goods_id'=>$id,
                        'create_time'=>time()
                    ];
                    DB::table('history')->insert($dataInfo);
                }

<<<<<<< HEAD


            return view('goods.goodslist',['res'=>$res,'car'=>$car,]);
=======
            }
            return view('goods.goodslist',['res'=>$res,'car'=>$car]);
>>>>>>> 7c7787479692daec1d9a015300637aaed85d1156
    }

    /**
     * 商品列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function goodsInfo(){
        $where=[
            'goods_status'=>1
        ];
        $goodsInfo=GoodsModel::where($where)->paginate(4);
        return view('goods.goods',['goodsInfo'=>$goodsInfo]);
    }

<<<<<<< HEAD
    public function aaa(){
        $id=$_GET['goods_id'];
//        dd($id);
        $where=[
            'goods_id'=>$id
        ];
        $res=PraiseModel::where($where)->first();
        if(empty($res)){
            echo "未收藏";
        }else{
            echo "收藏";
        }
=======
    /**
     * 浏览记录展示
     * @return false|string
     */
    public function historyShow(){
//        $user_id=session('user_id');
        $user_id=1;
        if(empty($user_id)){
            $arr=DB::table('shop_goods')->orderBy('is_tell','desc')->limit(10);
        }else{
            $whereInfo=[
                'user_id'=>$user_id
            ];
            $arr=DB::table('history')
                ->join('shop_goods','shop_goods.goods_id','=','history.goods_id')
                ->where($whereInfo)->get();
        }
//        $arrInfo=json_encode($arr);
        return view('goods/history',['arr'=>$arr]);
>>>>>>> 7c7787479692daec1d9a015300637aaed85d1156
    }
}
