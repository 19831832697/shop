<?php

namespace App\Http\Controllers\pay;

use App\Model\PayModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MoneyController extends Controller
{
    public $app_id;
    public $gate_way;
    public $notify_url;
    public $return_url;
    public $rsaPrivateKeyFilePath;
    public $aliPubKey;

    public function __construct()
    {
        $this->app_id = env('ALIPAY_APPID');
        $this->gate_way = 'https://openapi.alipaydev.com/gateway.do';
        $this->notify_url = env('ALIPAY_NOTIFY_URL');
        $this->return_url = env('ALIPAY_RETURN_URL');
        $this->rsaPrivateKeyFilePath = storage_path('app/keys/priv.pem');    //应用私钥
        $this->aliPubKey = storage_path('app/keys/pub.pem'); //支付宝公钥
    }

    public function test()
    {
        echo $this->aliPubKey;echo '</br>';
        echo $this->rsaPrivateKeyFilePath;echo '</br>';
    }

    /**
     * 点击去支付
     * @param Request $request
     */
    public function z_pay(Request $request)
    {
        $order_no = $_GET['order_no'];
        $where = [
            'order_no' => $order_no
        ];
        $dataInfo = PayModel::where($where)->first();
//        var_dump($dataInfo);die;
        if ($dataInfo) {
            $order_id = $dataInfo->order_id;
            //验证订单状态 是否已支付 是否是有效订单
            $order_info = DB::table('shop_order')->where(['order_id' => $order_id])->first();
//        var_dump($order_info);die;
            //判断订单是否已被删除
            if ($order_info->status == 2) {
                die("订单已被删除，无法支付");
            }
            //业务参数
            $bizcont = [
                'subject' => 'Lening-Order: ' . $order_id,
                'out_trade_no' => $order_info->order_no,
                'total_amount' => $order_info->order_amount,
                'product_code' => 'QUICK_WAP_WAY',
            ];
            //公共参数
            $data = [
                'app_id' => $this->app_id,
                'method' => 'alipay.trade.wap.pay',
                'format' => 'JSON',
                'charset' => 'utf-8',
                'sign_type' => 'RSA2',
                'timestamp' => date('Y-m-d H:i:s'),
                'version' => '1.0',
                'notify_url' => $this->notify_url,        //异步通知地址
                'return_url' => $this->return_url,        // 同步通知地址
                'biz_content' => json_encode($bizcont),
            ];

            //签名
            $sign = $this->rsaSign($data);
            $data['sign'] = $sign;
            $param_str = '?';
            foreach ($data as $k => $v) {
                $param_str .= $k . '=' . urlencode($v) . '&';
            }
            $url = rtrim($param_str, '&');
            $url = $this->gate_way . $url;
            return redirect($url, 302);
//            header("Location:".$url);
        }
    }

    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }

    protected function sign($data) {
        $priKey = file_get_contents($this->rsaPrivateKeyFilePath);
        $res = openssl_get_privatekey($priKey);
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        if(!$this->checkEmpty($this->rsaPrivateKeyFilePath)){
            openssl_free_key($res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }

    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, 'UTF-8');
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }

    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }

    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = 'UTF-8';
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }

    /**
     * 支付宝异步通知
     */
    public function notify()
    {
        $p = json_encode($_POST);
        $log_str = "\n>>>>>> " .date('Y-m-d H:i:s') . ' '.$p . " \n";
        $a=file_put_contents('logs/alipay_notify',$log_str,FILE_APPEND);
        //TODO 验签 更新订单状态
        $out_trade_no=$_POST['out_trade_no'];
        $where=[
            'order_no'=>$out_trade_no
        ];
//        //修改订单表
        $updateInfo=[
            'pay_status'=>2,
            'status'=>2,
        ];
        DB::table('shop_order')->where($where)->update($updateInfo);
        $dataInfo=DB::table('shop_order_detail')->where($where)->get();
        $data=[];
        foreach($dataInfo as $k=>$v){
            $data[]=$v->goods_id;
        }
        //查询商品表获取商品库存
        $arrInfo=DB::table('shop_goods')
            ->join('shop_cart','shop_goods.goods_id','=','shop_cart.goods_id')
            ->whereIn('shop_goods.goods_id',$data)->get();

        foreach($arrInfo as $k=>$v){
            $goods_num=$v->goods_num;
            $buy_num=$v->buy_num;
            $goodsInfo=[
                'goods_num'=>$goods_num-$buy_num
            ];
            DB::table('shop_goods')->where('goods_id',$v->goods_id)->update($goodsInfo);
        }
        //修改订单详情表
        $detailInfo=[
            'utime'=>time(),
        ];
        DB::table('shop_order_detail')->where($where)->update($detailInfo);
    }

    /**
     * 支付宝同步通知
     */
    public function aliReturn()
    {
        echo '<pre>';print_r($_GET);echo '</pre>';
    }
}
