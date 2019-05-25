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
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->

	<link rel="stylesheet" href="/css/materialize.css">
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/owl.carousel.css">
	<link rel="stylesheet" href="/css/owl.theme.css">
	<link rel="stylesheet" href="/css/owl.transitions.css">
	<link rel="stylesheet" href="/css/fakeLoader.css">
	<link rel="stylesheet" href="/css/animate.css">
	<link rel="stylesheet" href="/css/style.css">
	
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
	<!-- end menu -->
	
	<!-- shop single -->
	<div class="pages section">
		<div class="container">

			<div class="shop-single" goods_id="{{$res->goods_id}}">
				<img src="/{{$res->goods_img}}" alt="暂无图片">
				<h5>{{$res->goods_name}}</h5>
				<div class="price">${{$res->goods_price}} <span>${{$res->market_price}}</span></div>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eaque in non delectus, error iste veniam commodi mollitia, officia possimus, repellendus maiores doloribus provident. Itaque, ab perferendis nemo tempore! Accusamus</p>
						<input style="width: 50px; height: 38px; border: 2px white; float: left;" type="button"id="subtract" value="-" />
						<input style="width: 80px; height: 38px; float: left;" type="text" value="@if($car=='') 1 @else {{$car->buy_num}} @endif" id="text">
						<input style="width: 50px; height: 38px; border: 2px white; float: left;" type="button" id="add"value="+" goods_num="{{$res->goods_num}}" goods_id="{{$res->goods_id}}"/>

				<br><br><br><p style=" background-color: #008CBA;border: none;color: white;padding: 9px 40px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
						<a href="javascript:;"  id="cart" >加入购物车</a>

					<div class="glyphicon glyphicon-heart" style="width:150px;hight:150px; float: right;" id="button" goodsid="{{$res->goods_id}}"> 此处是点击收藏 </div>

					</p>
				<div class="review">
					<h5>1 reviews</h5>
					<div class="review-details">
						<div class="row">
							<div class="col s3">
								<img src="/img/user-comment.jpg" alt="" class="responsive-img">
							</div>
							<div class="col s9">
								<div class="review-title">
									<span><strong>John Doe</strong> | Juni 5, 2016 at 9:24 am | <a href="">Reply</a></span>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis accusantium corrupti asperiores et praesentium dolore.</p>
							</div>
						</div>
					</div>
				</div>	
				<div class="review-form">
					<div class="review-head">
						<h5>Post Review in Below</h5>
						<p>Lorem ipsum dolor sit amet consectetur*</p>
					</div>
					<div class="row">
						<form class="col s12 form-details">
							<div class="input-field">
								<input type="text" required class="validate" placeholder="NAME">
							</div>
							<div class="input-field">
								<input type="email" class="validate" placeholder="EMAIL" required>
							</div>
							<div class="input-field">
								<input type="text" class="validate" placeholder="SUBJECT" required>
							</div>
							<div class="input-field">
								<textarea name="textarea-message" id="textarea1" cols="30" rows="10" class="materialize-textarea" class="validate" placeholder="YOUR REVIEW"></textarea>
							</div>
							<div class="form-button">
								<div class="btn button-default">POST REVIEW</div>
							</div>
						</form>
						
					</div>
				</div>
		</div>
	</div>
	<!-- end shop single -->

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
	<script src="/js/jquery.min.js"></script>
	<script src="/js/materialize.min.js"></script>
	<script src="/js/owl.carousel.min.js"></script>
	<script src="/js/fakeLoader.min.js"></script>
	<script src="/js/animatedModal.min.js"></script>
	<script src="/js/main.js"></script>

</body>
</html>
<script>
	$(function(){
		$("#text").attr("disabled", true);
		var goods_id=$(".shop-single").attr('goods_id');
//		console.log(goods_id);
		$.get(
				"/goods/aaa?goods_id="+goods_id,
				function(res){
					console.log(res);
					if(res=="未收藏"){
						$("#button").css({color:"gray"}).html('未收藏');
					}else {
						$("#button").css({color:"red"}).html('已收藏');
					}
				}
		);
		//减
		$(document).on('click','#subtract',function(){
			var text=parseInt($("#text").val());
			var txt=text-1;
			if(text<=1){
				alert("购买数量不能小于1");
			}else{
				$("#text").val(txt);
			}
			$.get(
					'/add?goods_id='+goods_id+'&buy_num='+txt,
					function(res){
						console.log(res);
					}
			);
		})

		//加
		$(document).on('click','#add',function(){
			var text=parseInt($("#text").val());
			var goods_id=$(this).attr('goods_id');
			var goods_num=$(this).attr('goods_num');
			var txt=text+1;
			if(text>=goods_num){
				alert("购买数量不能大于库存");
			}else{
				$("#text").val(txt);
			}
			$.get(
					'/add?goods_id='+goods_id+'&buy_num='+txt,
					function(res){
						console.log(res);
					}
			);
		})


		//加入购物车
		$(document).on('click','#cart',function(){
			var buy_num=parseInt($("#text").val());
			var goods_id=$("#add").attr('goods_id');
			$.get(
				'/cart?goods_id='+goods_id+'&buy_num='+buy_num,
				function(res){
					if(res.ser==0){
						alert(res.msg);
					}else if(res.code==40025){
                        alert(res.msg);
                        window.location.href="/login";
					}else{
						alert(res.msg);
					}
				}
			);
		})
		//点击收藏
		$(document).on("click","#button",function(){
//			alert('收藏');
			var id=$(this).attr('goodsid');
			//console.log(id);
			$.get(
					"/col/add",
					{id:id},
					function(res){
						//console.log(res);
						if(res.error==1){
							$("#button").css({color:"red"}).html('已收藏');
						}else if(res.error==2){
							alert('收藏失败');
						}else if(res.error==3){
							$("#button").css({color:"gray"}).html('未收藏');
						}
					}
			)
		})
	})
</script>