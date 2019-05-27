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
        $res=Wx_user::insert($wx_info);
        Cookie::queue('user_id', $res);
    }
}
