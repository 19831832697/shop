<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;


Class UserController extends Controller
{
    //注册页面
    public function register()
    {

        return view('user.register');
    }

    //注册
    public function registerDo(Request $request)
    {
        $data = $request->input();
        $user_name = $data['user_name'];
        $user_email = $data['user_email'];
        $user_tel = $data['user_tel'];
        $user_pwd = $data['user_pwd'];
        //验证用户名是否存在
        $data1 = DB::table('user')->where(['user_name' => $user_name])->first();
        if ($data1) {
            $arr = [
                'code' => 0,
                'msg' => '此用户名已存在'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        //验证邮箱是否重复
        $data2 = DB::table('user')->where(['user_email' => $user_email])->first();
        if ($data2) {
            $arr = [
                'code' => 0,
                'msg' => '此邮箱已被注册'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        //验证手机号是否重复
        $data3 = DB::table('user')->where(['user_tel'=>$user_tel])->first();
        if ($data3) {
            $arr = [
                'code' => 0,
                'msg' => '此手机号已被注册'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        $time = time();
        //密码加密处理
        $password = password_hash($user_pwd, PASSWORD_BCRYPT);

        $dataInfo = [
            'user_name' => $user_name,
            'user_email' => $user_email,
            'user_tel' => $user_tel,
            'user_pwd' => $password,
            'add_time' => $time
        ];
        $res = DB::table('user')->insert($dataInfo);
        if ($res) {
            $arr = [
                'code' => 1,
                'msg' => '注册成功,请登录'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
    }

    //登陆页面
    public function login()
    {
        $appid=env('WX_APP');
        $urls=$_SERVER['HTTP_HOST'].'/auth/wxauth';
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=http://$urls&scope=snsapi_userinfo&state=STATE#wechat_redirect";
        return view('user.login',['url'=>$url]);
    }

    //登陆
    public function loginDo(){
        $user_name=$_POST['user_name'];
        $user_pwd=$_POST['user_pwd'];
        //验证为空
        if(empty($user_name) || empty($user_pwd)){
            $arr=[
                'code'=>0,
                'msg'=>'登陆所填元素不能为空'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

        $data=DB::table('user')->where(['user_name'=>$user_name])->first();

        if($data){
            $errno=$data->errno;
            $errno_time=$data->errno_time;
            $user_id=$data->user_id;
            $time=time();
            //用库存在
            if(password_verify($user_pwd,$data->user_pwd)){
                //登陆逻辑

                if($time - $errno_time < 3600){
                    if($errno >= 3){
                        $arr=[
                            'code'=>0,
                            'msg'=>'登录次数超过限制次数不能登陆'
                        ];
                        return json_encode($arr,JSON_UNESCAPED_UNICODE);
                    }
                }else{
                    $where=[
                        'errno'=>0,
                        'errno_time'=>$time
                    ];
                    DB::table('user')->where(['user_id'=>$user_id])->update($where);
                }
                Cookie::queue('user_id', $user_id);
                $arr=[
                    'code'=>1,
                    'msg'=>'登陆成功'
                ];

                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }else{
                if($time - $errno_time > 3600){
                    $where=[
                        'errno'=>1,
                        'errno_time'=>$time
                    ];
                    DB::table('user')->where(['user_id'=>$user_id])->update($where);
                }else{
                    if($errno >= 3){
                        $arr=[
                            'code'=>0,
                            'msg'=>'账号已锁定,请一小时后再次登陆'
                        ];
                        return json_encode($arr,JSON_UNESCAPED_UNICODE);
                    }else{
                        $where=[
                            'errno'=>$errno+1,
                            'errno_time'=>$time
                        ];
                        DB::table('user')->where(['user_id'=>$user_id])->update($where);
                    }
                }
                //登录失败
                $arr=[
                    'code'=>0,
                    'msg'=>'密码不正确'
                ];
                return json_encode($arr,JSON_UNESCAPED_UNICODE);
            }
        }else{
            $arr=[
                'code'=>0,
                'msg'=>'账号错误'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }

    //进入验证页面
    public  function password(){
        return view('user.password');
    }
    //验证码
    public function code(Request $request){
        $tel=$request->input('user_tel');
        $data=DB::table('user')->where(['user_tel'=>$tel])->first();
        if(empty($data)){
            $arr = ["code" => 0, "msg" => "请填写您注册时填写的手机号"];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
        $num = rand(1000,9999);
        $bol=100;
        if($bol == 100){
            $dataInfo=DB::table('code')->where(['tel'=>$tel])->first();
            if($dataInfo){
                $arr=array(
                    'tel'=>$tel,
                    'code'=>$num,
                    'out_time'=>time()+60,
                    'status'=>1,
                );
                $res=DB::table('code')->where(['tel'=>$tel])->update($arr);
                if ($res) {
                    $arr = ["code" => 1, "msg" => "发送验证码成功,有效期1分钟"];
                    return json_encode($arr,JSON_UNESCAPED_UNICODE);
                }else {
                    $arr = ["code" => 0, "msg" => "添加数据库失败"];
                    return json_encode($arr,JSON_UNESCAPED_UNICODE);
                }
            }else{
                $arr=array(
                    'tel'=>$tel,
                    'code'=>$num,
                    'out_time'=>time()+60,
                    'status'=>1,
                );
                $res=DB::table('code')->insert($arr);
                if ($res) {
                    $arr = ["code" => 1, "msg" => "发送验证码成功,有效期1分钟"];
                    return json_encode($arr,JSON_UNESCAPED_UNICODE);
                }else {
                    $arr = ["code" => 0, "msg" => "添加数据库失败"];
                    return json_encode($arr,JSON_UNESCAPED_UNICODE);
                }

            }


        }else{
            $arr=[
                'code'=>0,
                'msg'=>'验证码发送失败'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }


    }
    //验证身份
    public function checkId(Request $request)
    {
        $user_tel = $request->input('user_tel');

        $code = $request->input('code');
        $time = time();
        $codewhere = [
            'tel' => $user_tel,
            'code' => $code,
            'status' => 1
        ];
        // $sql="select * from code where tel=$name and code=$code and timeout>$time and `status`=1";
        $arrinfo = DB::table('code')->where($codewhere)->first();
        if ($arrinfo) {
            if ($time > $arrinfo->out_time) {
                $arr = [
                    'code' => 0,
                    'msg' => '验证码失效'
                ];
                return json_encode($arr, JSON_UNESCAPED_UNICODE);
            }else{

                setcookie('user_tel',$user_tel);

                $arr = [
                    'code' => 1,
                    'msg' => '验证身份成功,请您修改密码'
                ];
                return json_encode($arr, JSON_UNESCAPED_UNICODE);
            }
        } else {
            $arr = [
                'code' => 0,
                'msg' => '验证码错误'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }


    }
    //进入修改密码页面
    public function pwdShow(){
        return view('user.pwdshow');
    }
    //修改密码
    public function pwdChange(Request $request){
        $tel= $_COOKIE['user_tel'];
        $pwd1=$request->input('pwd1');
        //密码加密处理
        $password=password_hash($pwd1,PASSWORD_BCRYPT);
        $data=DB::table('user')->where(['user_tel'=>$tel])->update(['user_pwd'=>$password]);
        if($data){
            $arr=[
                'code'=>1,
                'msg'=>'修改密码成功,去登陆把'
            ];
            return  json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>0,
                'msg'=>'修改密码失败'
            ];
            return  json_encode($arr,JSON_UNESCAPED_UNICODE);
        }

    }
    //个人中心页面
    public function mycenter(Request $request)
    {
        $user_id = $request->cookie('user_id');
        if (empty($user_id)) {
            echo '请先登录';
            header('Refresh:2;url=login');die;
        }
        $data = DB::table('user')->where(['user_id' => $user_id])->first();
        return view('user.mycenter', ['data' => $data]);
    }
    //注销登录
    public function loginOut(){
        Cookie::queue('user_id', '');
        if (empty($user_id)) {
            $arr=[
                'code'=>1,
                'msg'=>'注销登录成功'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>0,
                'msg'=>'注销登录失败'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }
    //切换用户
    public function userChange(){
        Cookie::queue('user_id', '');
        if (empty($user_id)) {
            $arr=[
                'code'=>1,
                'msg'=>'切换用户成功'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }else{
            $arr=[
                'code'=>0,
                'msg'=>'切换用户失败'
            ];
            return json_encode($arr,JSON_UNESCAPED_UNICODE);
        }
    }


}

