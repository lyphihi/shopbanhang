<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('frontend/img/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<style>
		.color{
			color: red;
		}
	</style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>Giao hàng miễn phí cho đơn đặt hàng trên 1.000.000 vnđ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
					<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse"> <br>
								<li><a href="{{URL::TO('/trang-chu')}}" class="active">Trang chủ</a></li>
								<!-- <li class="dropdown"><a href="{{URL::TO('/san-pham')}}">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
                                    </ul>
                                </li>  -->
								<!-- <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a> -->
                                <!-- </li>  -->
								<li><a href="{{URL::TO('/san-pham')}}">Sản phẩm</a></li>
								<li><a href="{{URL::TO('/show-cart')}}">Giỏ hàng</a></li>
								<li><a href="contact-us.html">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav"> 
								
								<!-- <li><a href="#"><i class="fa fa-star"></i>Yêu thích</a></li> -->
								<?php 
									$kh_id = Session::get('kh_id');
									$hd_id = Session::get('hd_id');
									if($kh_id!=NULL && $hd_id==NULL ){
								?>
								<li><a href="{{URL::TO('/checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php }elseif($kh_id!=NULL && $hd_id!=NULL ){ ?>
									<li><a href="{{URL::TO('/thanhtoan')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
						
								<?php }else{ ?>
									<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
								<?php } ?>
								<li><a href="{{URL::TO('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php 
									$kh_id = Session::get('kh_id');
									if($kh_id!=NULL){
								?>
								<li><a href="{{URL::TO('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								<?php }else{ ?>
								<li><a href="{{URL::TO('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								<?php } ?>
								<li>
									<form  action="{{URL::TO('/tim-kiem')}}" method="post">
									{{csrf_field()}}
									<div class="search_box pull-right">
										<input name="tukhoa" type="text" placeholder="Tìm kiếm"/>
										<button name="search" type="submit" placeholder="Search" class="btn btn-warning btn-sm" name="tukhoa" type="text">Tìm</button>
										<!-- <input name="search" type="submit" placeholder="Search" class="btn btn-warning btn-sm" value="Tìm"/> -->
									</div>
									</form>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-12">
									<img src="{{asset('frontend/img/girl1.jpg')}}" height="300px" width="1000px"  alt="" />
									
								</div>
							</div>
							<div class="item">
							<div class="col-sm-12">
									<img src="{{asset('frontend/img/girl2.jpg')}}" height="300px" width="1000px"  alt="" />
									
								</div>
							</div>
							
							<div class="item">
							<div class="col-sm-12">
									<img src="{{asset('frontend/img/girl3.jpg')}}" height="300px" width="1000px" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu sản phẩm</h2>
							<div class="brands-name" class="w3-sidebar w3-bar-block w3-red">
								<ul class="nav nav-pills nav-stacked" >
									@foreach($nsx as $key => $nsx)
									<li class="color"><a href="{{URL::TO('/nha-san-xuat/'.$nsx->nsx_id)}}"> <span class="pull-right"></span>{{$nsx->nsx_ten}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{asset('frontend/img/iframe1.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<img src="{{asset('frontend/img/iframe2.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<img src="{{asset('frontend/img/iframe3.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
									<img src="{{asset('frontend/img/iframe4.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

	<!-- href="{{asset('frontend/css/bootstrap.min.css')}}" -->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>