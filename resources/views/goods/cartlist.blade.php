<style>
    .b{
        color:red;
    }
</style>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <title>第七组</title>
    <meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">

    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/fakeLoader.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png">

</head>
<body>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- navbar top -->
<div class="navbar-top">
    <!-- site brand	 -->
    <div class="site-brand">
        <a href="/"><h1>Mstore</h1></a>
    </div>
    <!-- end site brand	 -->
    <div class="side-nav-panel-right">
        <a href="#" data-activates="slide-out-right" class="side-nav-left"><i class="fa fa-user"></i></a>
    </div>
</div>
<!-- end navbar top -->

<!-- side nav right-->
<div class="side-nav-panel-right">
    <ul id="slide-out-right" class="side-nav side-nav-panel collapsible">
        <li class="profil">
            <img src="img/profile.jpg" alt="">
            <h2>John Doe</h2>
        </li>
        <li><a href="setting.html"><i class="fa fa-cog"></i>个人中心</a></li>
        <li><a href="about-us"><i class="fa fa-user"></i>关于我们</a></li>
        <li><a href="contact.html"><i class="fa fa-envelope-o"></i>联系我们</a></li>
        <li><a href="login"><i class="fa fa-sign-in"></i>登录</a></li>
        <li><a href="register.html"><i class="fa fa-user-plus"></i>注册</a></li>
    </ul>
</div>
<!-- end side nav right-->

<!-- navbar bottom -->
<div class="navbar-bottom">
    <div class="row">
        <div class="col s2">
            <a href="/"><i class="fa fa-home"></i></a>
        </div>
        <div class="col s2">
            <a href="/col/list"><i class="fa fa-heart"></i></a>
        </div>
        <div class="col s4">
            <div class="bar-center">
                <a href="/cartlist"><i class="fa fa-shopping-basket"></i></a>
                <span>2</span>
            </div>
        </div>
        <div class="col s2">
            <a href="#"><i class="fa fa-envelope-o"></i></a>
        </div>
        <div class="col s2">
            <a href="#animatedModal2" id="nav-menu"><i class="fa fa-bars"></i></a>
        </div>
    </div>
</div>
<!-- end navbar bottom -->

<!-- menu -->
<div class="menus" id="animatedModal2">
    <div class="close-animatedModal2 close-icon">
        <i class="fa fa-close"></i>
    </div>
    <div class="modal-content">
        <div class="container">
            <div class="row">
                <div class="col s4">
                    <a href="/" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-home"></i>
                            </div>
                            商品首页
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="/goods/goodsinfo" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-bars"></i>
                            </div>
                            商品列表
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="/col/list" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-heart"></i>
                            </div>
                            收藏
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col s4">
                    <a href="cartlist" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            购物车
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="#" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-credit-card"></i>
                            </div>
                            银行卡
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="historyShow" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-file-text-o"></i>
                            </div>
                            浏览历史
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col s4">
                    <a href="#" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>
                            联系我们
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="contact.html" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            Contact
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="#" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-cog"></i>
                            </div>
                            个人中心
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">

                <div class="col s4">
                    <a href="login" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-sign-in"></i>
                            </div>
                            登录
                        </div>
                    </a>
                </div>
                <div class="col s4">
                    <a href="register" class="button-link">
                        <div class="menu-link">
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            注册
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- cart -->
<div class="cart section">
    <div class="container">
        <div class="pages-head">
            <h3>购物车</h3>
        </div>
        <div class="content" >
            @foreach($arr as $v)

                <div class="cart-1">

                    <div class="row">

                        <div class="col s5" id="catr">
                            <h5>商品图片</h5>
                        </div>
                        <div id="aa" type="1"class="glyphicon glyphicon-ok" amount="{{$v->goods_price * $v->buy_num}}"
                             goods_id="{{$v->goods_id}}" catr_id="{{$v->id}}"></div>
                        <div class="col s7">
                            <img src="/{{$v->goods_img}}" alt="" style="height: 300px; width: 280px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>商品名称</h5>
                        </div>
                        <div class="col s7">
                            <h5><a href="">{{$v->goods_name}}</a></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>购买数量</h5>
                        </div>
                        <div class="col s7">
                            <input value="{{$v->buy_num}}" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>价格</h5>
                        </div>
                        <div class="col s7">
                            $<h5 ><span id="zong">{{$v->goods_price * $v->buy_num}}</span></h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s5">
                            <h5>删除</h5>
                        </div>
                        <div class="col s7">
                            <h5><i class="fa fa-trash" goods_id="{{$v->goods_id}}"></i></h5>
                        </div>
                    </div>
                    <div class="divider"></div>
                </div>

            @endforeach
        </div>
        <div class="total">
            <div class="row">
                <div class="col s7">
                    <h5>总价</h5>
                </div>
                <div class="col s5">
                    <h5>$<sanm id="am">0</sanm></h5>
                </div>
            </div>

        </div>
        <input type="button" class="button-default" id="btn" value="提交订单">
    </div>
</div>
<!-- end cart -->

<!-- loader -->
<div id="fakeLoader"></div>

<!-- end loader -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="about-us-foot">
            <h6>成功便是站起比倒下多一次</h6>
            <p>无论什么时候，不管遇到什么情况，我绝不允许自己有一点点灰心丧气</p>
        </div>
        <div class="social-media">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-google"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
        </div>
        <div class="copyright">
            <span>© 2019 第七组</span>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/fakeLoader.min.js"></script>
<script src="js/animatedModal.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
</html>
<script>
    $(document).ready(function(){
        //单选
        var sum=0
         $(document).on('click','.glyphicon',function(){
             var type=$(this).attr('type');
             if (type == 1){
                 $(this).attr('type',2);
                 $(this).addClass('b');
             }else{
                 $(this).removeClass("b"); //移除
                 $(this).attr('type',1);
             }
            $.each($(this),function(){
                var type=$(this).attr('type');
                if (type == 2){
                    sum += parseInt($(this).attr('amount'));
                }else{
                    sum -= parseInt($(this).attr('amount'));
                }
            });
             $("#am").html(sum);
        })

        //删除
        $(document).on('click','.fa',function(){
            var goods_id=$(this).attr('goods_id');
//            console.log(goods_id);
            $.get(
                    '/subtract',
                    {goods_id:goods_id},
                    function(res){
                        if(res=="删除成功"){
                            alert('删除成功');
                            window.location.reload();
                        }else{
                            alert('删除失败');
                        }
                    }
            );
        })

         //点击去结算
        $(document).on('click','#btn',function(){
            var order_amount= $("#am").html();//总价格
            var goods_id="";
            $.each($('.glyphicon-ok'),function() {
                var type=$(this).attr('type');
                if (type == 2){
                    goods_id += $(this).attr('goods_id') + ',';
                }
            })
            $.ajax({
                url:"/pay",
                method:"POST",
                data:{order_amount:order_amount,goods_id:goods_id},
                dataType:"json",
                success:function(data){
                    if(data.code==40020){
                        alert(data.msg);
                        // window.location.href="/login";
                    }else if(data.code==200){
                        var order_no=data.order_no;
                        window.location.href="/paylist?order_no="+data.order_no;
                    }
                }
            })
        })

    })
</script>