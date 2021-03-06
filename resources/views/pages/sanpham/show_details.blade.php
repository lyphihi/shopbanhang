@extends('layout')
@section('content')
@foreach($details_sp as $key => $value)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{asset('public/uploads/product/'.$value->sp_ha)}}" alt="" />
            
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <!-- <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="{{asset('frontend/img/similar1.jpg')}}" alt=""></a>
                        <a href=""><img src="{{asset('frontend/img/similar2.jpg')}}" alt=""></a>
                        <a href=""><img src="{{asset('frontend/img/similar3.jpg')}}" alt=""></a>
                    </div>
                    
                </div> -->

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$value->sp_ten}}</h2>
            <p>ID: {{$value->sp_id}}</p>
            <img src="images/product-details/rating.png" alt="" />
            <form action="{{URL::TO('/save-cart')}}" method="post" >
            {{csrf_field()}}
                <span>
                    <span>{{number_format($value->sp_gia).' VNĐ'}}</span>
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1" value="1" />
                    <input name="spid_hidden" type="hidden" value="{{$value->sp_id}}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm vào giỏ hàng
                    </button>
                </span>
            </form>
            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> New</p>
            <p><b>Thương hiệu:</b> {{$value->nsx_ten}}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
@endforeach
@foreach($details_sp as $key => $value)
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
            <li ><a href="#reviews" data-toggle="tab">Sản phẩm gợi ý</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <p>{{$value->sp_mota}}</p>
        </div>
        
        <div class="tab-pane fade " id="reviews" >
            <div class="col-sm-12">
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">	
                    @foreach($related as $key => $lienquan)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{asset('public/uploads/product/'.$lienquan->sp_ha)}}" alt="" />
                                    <h2>{{number_format($lienquan->sp_gia).' VNĐ'}}</h2>
                                    <p>{{$lienquan->sp_ten}}</p>
                                    <a href="{{URL::TO('chi-tiet-san-pham/'.$lienquan->sp_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>			
            </div>
            </div>
            </div>
        </div>   
    </div>
</div><!--/category-tab-->
@endforeach
<!--recommended_items-->
<!-- <div class="recommended_items">
    <h2 class="title text-center">Sản phẩm gợi ý</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">	
                @foreach($related as $key => $lienquan)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('public/uploads/product/'.$lienquan->sp_ha)}}" alt="" />
                                <h2>{{number_format($lienquan->sp_gia).' VNĐ'}}</h2>
                                <p>{{$lienquan->sp_ten}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>			
        </div>
    </div> -->
    <!--/recommended_items-->
@endsection	