<?php

namespace App\Http\Controllers\Collect;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PraiseModel;
use App\Model\GoodsModel;
use Illuminate\Support\Facades\Cookie;
class ColController extends Controller
{
    //收藏
    public function add(Request $request){
        $user_id = $request->cookie('user_id');
        // echo $user_id;die;
        if(empty($user_id)){
            echo "<script>alert('请先登录');location.href='/login';</script>";
        }
        $id=$request->input('id');
       // dd($id);
        $where=[
            'goods_id'=>$id

        ];
        $arr=PraiseModel::where($where)->first();
        if($arr){
            $pwhere=[
                'praise_id'=>$arr->praise_id,
                'user_id'=>$user_id
            ];
            $p=PraiseModel::where($pwhere)->delete();

            if($p){
                $arr=[
                    'error'=>3
                ];
                return $arr;
            }

        }
        //添加
        $goodsInfo=GoodsModel::where($where)->first();
        $info=[
            'user_id'=>$user_id,
            'goods_id'=>$goodsInfo->goods_id,
            'praise_name'=>$goodsInfo->goods_name,
            'praise_price'=>$goodsInfo->goods_price,
            'praise_img'=>$goodsInfo->goods_img
        ];
        $res=PraiseModel::insert($info);
        if($res){
                $arr=[
                    'error'=>1
                ];
                return $arr;
            }else{
                $arr=[
                    'error'=>2
                ];
                return $arr;
         }
       // return view();
    }
    //展示
    public function list(Request $request){
        $user_id = $request->cookie('user_id');
        $arr=PraiseModel::where(['user_id'=>$user_id])->orderBy('praise_id','desc')->get();
       // dd($arr);
            return view('col.col',['arr'=>$arr]);
    }
    //删除
    public function del(Request $request){
        $id=$request->input('id');
        //dd($id);
        $where=[
            'praise_id'=>$id
        ];
        $res=PraiseModel::where($where)->delete();
        if($res){
            $arr=[
                'error'=>1
            ];
            return $arr;
        }else{
            $arr=[
                'error'=>2
            ];
            return $arr;
        }
    }
    //全部删除
    public function dela(Request $request){
            $id=$request->input('id');
            $id=explode(',',$id);
           //dd($id);
        //    $where=[
        //        'praise_id'=>$id
        //    ];
           $res=PraiseModel::destroy($id);
           if($res){
                $arr=[
                    'error'=>1
                ];
                return $arr;
           }
    }

}
