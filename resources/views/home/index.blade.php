<!DOCTYPE html>
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
        <li><a href="/aboutus"><i class="fa fa-cog"></i>个人中心</a></li>
        <li><a href="/aboutus"><i class="fa fa-user"></i>关于我们</a></li>
        <li><a href="contact"><i class="fa fa-envelope-o"></i>联系我们</a></li>
        <li><a href="login"><i class="fa fa-sign-in"></i>登录</a></li>
        <li><a href="/register"><i class="fa fa-user-plus"></i>注册</a></li>
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
<!-- end menu -->

<!-- cart menu -->
<div class="menus" id="animatedModal">
    <div class="close-animatedModal close-icon">
        <i class="fa fa-close"></i>
    </div>
    <div class="modal-content">
        <div class="cart-menu">
            <div class="container">
                <div class="content">
                    <div class="cart-1">
                        <div class="row">
                            <div class="col s5">
                                <img src="img/cart-menu1.png" alt="">
                            </div>
                            <div class="col s7">
                                <h5><a href="">Fashion Men's</a></h5>
                            </div>
                        </div>
                        <div class="row quantity">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input value="1" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>$20</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <div class="action"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="cart-2">
                        <div class="row">
                            <div class="col s5">
                                <img src="img/cart-menu2.png" alt="">
                            </div>
                            <div class="col s7">
                                <h5><a href="">Fashion Men's</a></h5>
                            </div>
                        </div>
                        <div class="row quantity">
                            <div class="col s5">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col s7">
                                <input value="1" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Price</h5>
                            </div>
                            <div class="col s7">
                                <h5>$20</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s5">
                                <h5>Action</h5>
                            </div>
                            <div class="col s7">
                                <div class="action"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="total">
                    <div class="row">
                        <div class="col s7">
                            <h5>Fashion Men's</h5>
                        </div>
                        <div class="col s5">
                            <h5>$21.00</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s7">
                            <h5>Fashion Men's</h5>
                        </div>
                        <div class="col s5">
                            <h5>$21.00</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s7">
                            <h6>Total</h6>
                        </div>
                        <div class="col s5">
                            <h6>$41.00</h6>
                        </div>
                    </div>
                </div>
                <button class="btn button-default">Process to Checkout</button>
            </div>
        </div>
    </div>
</div>
<!-- end cart menu -->

<!-- slider -->
<div class="slider">

    <ul class="slides">
        <li>
            <img class="img"src="https://www.runoob.com/try/demo_source/pineapple.jpg" alt="">
            <div class="caption slider-content  center-align">
                <h2>跟我玩你指定输，整不好还得哭</h2>
                <h4>每天努力奋斗一点点，以后的生活更扎实</h4>
                <a href="" class="btn button-default">立即去购物</a>
            </div>
        </li>
        <li>
            <img class="img" src="https://www.runoob.com/try/demo_source/pineapple.jpg" alt="">
            <div class="caption slider-content center-align">
                <h2>跟我玩你指定输，整不好还得哭</h2>
                <h4>不要辜负自己所受的苦难，并且配得上自己的野心</h4>
                <a href="" class="btn button-default">立即去购物</a>
            </div>
        </li>

    </ul>

</div>
<!-- end slider -->

<!-- features -->
<div class="features section">
    <div class="container">
        <div class="row">
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-car"></i>
                    </div>
                    <h6>Free Shipping</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <h6>Money Back</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
        </div>
        <div class="row margin-bottom-0">
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-lock"></i>
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
            <div class="col s6">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-support"></i>
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Lorem ipsum dolor sit amet consectetur</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end features -->

<!-- quote -->
<div class="section quote">
    <div class="container">
        <h4>永远要相信边上的人比你聪明</h4>
        <p>一个人真正的智慧，是用积极的心态，专注于自己喜欢的事，别人怎么说，怎么看，都不重要，重要的是要活出自己
        </p>
    </div>
</div>
<!-- end quote -->

<!-- product -->
<div class="section product">
    <div class="container">
        <div class="section-head">
            <h4>最新商品</h4>
            <div class="divider-top"></div>
            <div class="divider-bottom"></div>
        </div>
        @foreach($goodsInfo as $k=>$v)
        <div class="row " >
            <div class="col s6">
                <div class="content">
                    <a href="/goods/goodslist?goods_id={{$v->goods_id}}"><img src="{{$v->goods_img}}" alt="" ></a>
                    <h6><a href="/goods/goodslist?goods_id={{$v->goods_id}}">{{$v->goods_name}}</a></h6>
                    <div class="price">
                        ${{$v->goods_price}} <span>${{$v->market_price}}</span>
                    </div>
                    <button class="btn button-default" id="str" goods_id="{{$v->goods_id}}" buy_num="1">加入购物车</button>
                </div>
            </div>
        @endforeach
            </div>
        </div>
       
        </div>
    </div>
</div>
<!-- end product -->

<!-- promo -->
<div class="promo section">
    <div class="container">
        <div class="content">
            <h4>PRODUCT BUNDLE</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            <button class="btn button-default">SHOP NOW</button>
        </div>
    </div>
</div>
<!-- end promo -->

<!-- product -->
<div class="section product">
    <div class="container">
        <div class="section-head">
            <h4>顶级产品</h4>
            <div class="divider-top"></div>
            <div class="divider-bottom"></div>
        </div>
        @foreach($goods as $k=>$v)
        <div class="row">
            <div class="col s6">
                <div class="content">
                    <img src="{{$v->goods_img}}" alt="" >
                    <h6><a href="/goods/goodslist?goods_id={{$v->goods_id}}">{{$v->goods_name}}</a></h6>
                    <div class="price">
                    ${{$v->market_price}} <span>${{$v->goods_price}}</span>
                    </div>
                    <button class="btn button-default" id="str" goods_id="{{$v->goods_id}}" buy_num="1">加入购物车</button>
                </div>
            </div>
            @endforeach
      
        </div>


        <div class="pagination-product">

            <ul>
                <!-- <li class="active"> -->
                {{ $goods->links() }}
                <!-- </li> -->

            </ul>
        </div>
    </div>
</div>
<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
<!-- end product -->

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
<script>
    $(function(){
        $(document).on('click','#str',function () {
            var buy_num=$(this).attr('buy_num');
            var goods_id=$(this).attr('goods_id');

            $.get(
                    '/cart',
                    {goods_id:goods_id,buy_num:buy_num},
                    function(res){
                        if(res.ser==0){
                            alert(res.msg);
                        }else{
                            alert(res.msg);
                        }
                    }
            );
        })
    })
</script>
<style>
    .img {
        -webkit-animation: mymove 7s infinite; /* Chrome, Safari, Opera */
        animation: mymove 7s infinite;
    }
    /* Chrome, Safari, Opera */
    @-webkit-keyframes mymove {
        50% {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }
    }
    /* Standard syntax */
    @keyframes mymove {
        50% {
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }
    }
</style>