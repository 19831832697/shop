<?php

namespace App\Http\Controllers\Auths;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use Illuminate\Support\Facades\Cookie;
=======
>>>>>>> cuifang
use App\Model\Wx_user;
class AuthsController extends Controller
{
    public function wxauth(){
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
        $info=[
            'openid'=>$urlinfo['openid'],
            'nickname'=>$urlinfo['nickname'],
            'sex'=>$urlinfo['sex'],
            'headimgurl'=>$urlinfo['headimgurl'],
        ];
<<<<<<< HEAD
        $acc=DB::table('wx_user')->where(['openid'=>$urlinfo['openid']])->first();
        $wx_id=$acc->wx_id;
        if($acc){
            echo "<script>alert('欢迎回来');location.href='/';</script>";
        }else{
            $res=DB::insertId($info);
            dd($res);
            
            if($res){
                Cookie::queue('wx_id', $wx_id);
=======
        $acc=DB::table('wx_user')->where(['openid'=>$openid])->first();
        if($acc){
            echo "<script>alert('欢迎回来');location.href='/login';</script>";
        }else{
            $res=Wx_user::insertId($info);
            dd($res);
            if($res){
>>>>>>> cuifang
                echo "<script>alert('登录成功');location.href='/';</script>";
            }else{
                echo "<script>alert('微信授权失败');location.href='/login';</script>";
            }
        }
    }
}
