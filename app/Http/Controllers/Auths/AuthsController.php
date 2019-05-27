<?php

namespace App\Http\Controllers\Auths;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthsController extends Controller
{
    //微信授权
    public function add(){
        $appid=env('WX_APP');
        $urls="http://www.shop.com/wxauth";
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$urls&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
        dd($url);
    }

    public function wxauth(){
        dd($_GET['code']);
    }
}
