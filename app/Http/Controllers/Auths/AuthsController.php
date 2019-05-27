<?php

namespace App\Http\Controllers\Auths;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthsController extends Controller
{
    //微信授权
    public function add(){
        $appid=env('WX_APP');
        $urls=$_SERVER['HTTP_HOST'].'/wxauth';
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$urls&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
        dd($url);
    }
    public function wxauth(){
        $appid=env('WX_APP');
        $secret=env('WX_APPSECRETl');
        $code=$_GET['code'];
        $tokenurl="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $token=$this->getcurl($tokenurl);
        $access_tokenurl="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=$appid&grant_type=refresh_token&refresh_token=$token";
        $access_token=$this->getcurl($access_tokenurl);
        $access_token_arr=json_decode($access_token,true);
        echo "获取access_token";print_r($access_token_arr);echo "<br>";
    }
    //curl
    public function getcurl($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        echo $output;
        curl_close($ch);
    }
}
