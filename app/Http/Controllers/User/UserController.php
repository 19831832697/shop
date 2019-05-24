<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


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
        $user_pwd = $data['user_pwd'];
        $user_pwd1 = $data['user_pwd1'];
        //验证为空
        if (empty($user_name) || empty($user_email) || empty($user_pwd)) {
            $arr = [
                'code' => 0,
                'msg' => '所填元素不能为空'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
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
        //验证密码
        if ($user_pwd !== $user_pwd1) {
            $arr = [
                'code' => 0,
                'msg' => '密码与确认密码不一致'
            ];
            return json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
        $time = time();
        //密码加密处理
        $password = password_hash($user_pwd, PASSWORD_BCRYPT);

        $dataInfo = [
            'user_name' => $user_name,
            'user_email' => $user_email,
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
        return view('user.login');
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
                setcookie('user_id',$user_id);
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


}

