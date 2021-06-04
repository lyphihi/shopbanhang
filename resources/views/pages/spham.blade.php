@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Danh sách sản phẩm </h2>
	@foreach($sp as $key => $sp1)
	<a href="{{URL::TO('chi-tiet-san-pham/'.$sp1->sp_id)}}">
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{URL::TO('public/uploads/product/'.$sp1->sp_ha)}}" height="240px" width="210px" alt="" />
						<h2>{{number_format($sp1->sp_gia).' VNĐ'}}</h2>
						<p>{{$sp1->sp_ten}}</p>
						<!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> -->
					</div>
					<!-- <div class="product-overlay">
						<div class="overlay-content">
							<h2>$56</h2>
							<p>Easy Polo Black Edition</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>
					</div> -->
				</div>
				<!-- <div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
					</ul>
				</div> -->
			</div>
		</div>
	</a>
	@endforeach
</div><!--features_items-->

@endsection			