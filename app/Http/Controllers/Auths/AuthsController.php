<?php

namespace App\Http\Controllers\Auths;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Model\Wx_user;
use App\Model\UserModel;
class AuthsController extends Controller
{
    public function wxauth(Request $request){
        $appid=env('WX_APP');
        $secret=env('WX_APPSECRETl');
        $code=$_GET['code'];
        $tokenurl="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $token=file_get_contents($tokenurl);
        $token_arr=json_decode($token,true);
        $access_token=$token_arr['access_token'];
        $openid=$token_arr['openid'];
        $url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $user=file_get_contents($url);
        $urlinfo=json_decode($user,true);
        $user_info=UserModel::where(['user_name'=>$urlinfo['nickname']])->first();
        if($user_info){
            $user_id=$user_info->user_id;
            Cookie::queue('user_id', $user_id);
            echo "<script>alert('欢迎回来');location.href='/';</script>";
        }else{
            $info=[
                'user_name'=>$urlinfo['nickname'],
                'user_img'=>$urlinfo['headimgurl'],
                'add_time'=>time()
            ];
            $res=UserModel::insertGetId($info);
            $wx_info=[
                'openid'=>$urlinfo['openid'],
                'nickname'=>$urlinfo['nickname'],
                'sex'=>$urlinfo['sex'],
                'headimgurl'=>$urlinfo['headimgurl'],
                'user_id'=>$res
            ];
            $reas=Wx_user::insert($wx_info);
            Cookie::queue('user_id', $res);
            if($res){
                echo "<script>alert('授权成功');location.href='/';</script>";
            }else{
                echo "<script>alert('授权失败');location.href='/login';</script>";
            }
        }

    }
}
