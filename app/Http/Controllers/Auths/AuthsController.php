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
    }
    public function wxauth(){
        $appid=env('WX_APP');
        $secret=env('WX_APPSECRETl');
        $code=$_GET['code'];
        $tokenurl="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $token=$this->getcurl($tokenurl);
        dd($token);
        $access_tokenurl="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=$appid&grant_type=refresh_token&refresh_token=$token";
        $access_token=$this->getcurl($access_tokenurl);
        $access_token_arr=json_decode($access_token,true);
        print_r($access_token);echo "<br>";
        dd($access_token_arr);
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
    public function cc(){
        $cc='{"access_token":"21_v_vZAU_aFSZp44ujU9F8cl-aMJVstDJeerW0J_XEbxpdrC29GYyoY8rhMonqhLyMC-PlsNCiQ0o_N_uKPuPtZr_stgYykcY8V_jBcoHXjvo","expires_in":7200,"refresh_token":"21_sE7-q63XK9G6HAFdhvlK7EG1HyApXVfkSunx7yVGDcpcZCWvyn8ovOqfrUCU3i28LanTvYv6g9YuhPtjK6JF5NjMlfnn4mTNXZjlUfCo9IM","openid":"o4ekM6MX0DCu_8fmTXaECirRFjjc","scope":"snsapi_base"}{"errcode":41003,"errmsg":"refresh_token missing, hints: [ req_id: qEncy6yFe-X.QQla ]"}';
        echo $cc;echo "<br>";
        $access_token_arr=json_decode($cc,true);
        dd($access_token_arr);
    }
}
