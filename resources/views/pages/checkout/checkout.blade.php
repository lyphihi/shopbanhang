@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::TO('/')}}">Trang chủ</a></li>
                <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Đăng ký hoặc đăng nhập để thanh toán giỏ hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin hoá đơn</p>
                        <div class="form-one">
                            <form action="{{URL::TO('/save-checkout-customer')}}" method="post">
                            {{csrf_field()}}
                                <input type="text" name="hd_ten" placeholder="Họ và tên">
                                <input type="text" name="hd_diachi" placeholder="Địa chỉ">
                                <input type="text" name="hd_sdt" placeholder="Số điện thoại">
                                <input type="email" name="hd_email" placeholder="Email">
                                <textarea name="hd_mota"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
                                <button type="submit" name="send_order" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>				
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>

        <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
    </div>
</section> <!--/#cart_items-->
@endsection	