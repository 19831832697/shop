<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GoodsModel;
use App\Model\PraiseModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
class GoodsController extends Controller
{
    //商品详情
    public function goodslist(Request $request){
        //测试
            // $a=$_SERVER['HTTP_USER_AGENT'];
            // dd($a);
        $id=$request->input('goods_id');
        $where=[
            'goods_id'=>$id
        ];
        //查询商品表
        $res=GoodsModel::where($where)->first();
        $user_id = $request->cookie('user_id');
        if(empty($user_id)){
            echo "<script>alert('请先登录');location.href='/login';</script>";
        }
        $whereInfo=[
            'goods_id'=>$id,
            'user_id'=>$user_id,
        ];
        //查询购物车表
        $car=DB::table('shop_cart')->where($whereInfo)->first();
        if($car){
            $status=$car->status;
            if($status==2){
                DB::table('shop_cart')->where($whereInfo)->update(['buy_num'=>1]);
            }
        }

        //浏览历史
        if(empty($user_id)){
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

        }
        return view('goods.goodslist',['res'=>$res,'car'=>$car]);
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

    /**
     * 浏览记录展示
     * @return false|string
     */
    public function historyShow(Request $request){
        $user_id = $request->cookie('user_id');
        if(empty($user_id)){
            echo "<script>alert('请先登录');location.href='/login';</script>";
        }
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
        return view('goods/history',['arr'=>$arr]);
    }

    /**
     * 收藏
     */
    public function aaa(Request $request){
        $user_id = $request->cookie('user_id');
        $id=$_GET['goods_id'];
        $where=[
            'goods_id'=>$id,
            'user_id'=>$user_id
        ];
        $res=PraiseModel::where($where)->first();
        if(empty($res)){
            echo "未收藏";
        }else{
            echo "收藏";
        }
    }
}
