<?php

namespace App\Http\Controllers\Auths;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
class AuthsController extends Controller
{
    //微信授权
    public function add(){
        $appid=env('WX_APP');
        $urls=$_SERVER['HTTP_HOST'].'/wxauth';
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$urls&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
    }
    public function wxauth(){
        $appid=env('WX_APP');
        $secret=env('WX_APPSECRETl');
        $code=$_GET['code'];
        $tokenurl="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $token=file_get_contents($tokenurl);
        $token_arr=json_decode($token,true);
        dd($token_arr);
        $access_token=$token_arr['access_token'];
        $openid=$token_arr['openid'];
        $url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
        $user=$this->getcurl($url);
        $urlinfo=json_decode($user,true);
        print_r($urlinfo);
    }
    //getcurl
    public function getcurl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        echo $output;
        curl_close($ch);
    }
}
