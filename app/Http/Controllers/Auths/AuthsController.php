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
        $token=$this->token($code);
        dd($token);
        $url="https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN";
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
        $cc='{"access_token":"21_OG16anbZuW-csAXPL12tYLDKs38OaLVlLyVY5rUF2SdpuVVebi__vIqWz6WNcg84HFx5TwzrBZ91lJDqueVpQ_GCHNGm6Af3YPIQUztcLss","expires_in":7200,"refresh_token":"21_X9osfsS9Py_v2BeMk5E4Uw2Z2cVmHKZfgy4Q-5z_ZDwHRIXOow2cNbCwbzkckaKQ0laGQAxVBwgBF7PPxfYW8IXQvFeybAVg-lSh2GW-jxg","openid":"o4ekM6MX0DCu_8fmTXaECirRFjjc","scope":"snsapi_base"}';
        echo $cc;echo "<br>";
        $access_token_arr=json_decode($cc,true);
        dd($access_token_arr);
    }

    //tokne
    public function token($code){
        $appid=env('WX_APP');
        $secret=env('WX_APPSECRETl');
        $key="token";
        $access_token=Redis::get($key);
        if(!$access_token){
            $tokenurl="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
            $token=$this->getcurl($tokenurl);
            $token_arr=json_decode($token,true);
            $access_token1=$token_arr['access_token'];
            $openid=$token_arr['openid'];
            $openid="openid$openid";
            Redis::set($openid,$openid);
            Redis::set($key,$access_token1);
            Redis::expire($key,3600);
            return $arr=[
                'access_token'=>$access_token1,
                'openid'=>$openid
            ];
        }else{
            return $arr=[
                'access_token'=>$access_token,
                'openid'=>Redis::get($openid)
            ];
        }
    }
}
