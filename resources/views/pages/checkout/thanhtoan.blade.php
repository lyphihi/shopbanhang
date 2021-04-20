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

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
        <?php
        $content = Cart::content();
        // echo '<pre>';
        // print_r($content);
        // echo '</pre>';
        ?>
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::TO('public/uploads/product/'.$v_content->options->image)}}" width="50px" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$v_content->name}}</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).' vnđ'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{URL::TO('/update-cart')}}" method="post">
                                    {{csrf_field()}}
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$v_content->qty}}"  size="2">
                                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                    <input type="submit" value="Cập nhật" name="update" class="btn btn-default btn-sm">
                                </form>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                <?php
                                $subtotal = $v_content->price * $v_content->qty;
                                echo number_format($subtotal).' vnđ';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::TO('/delete-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <h4>Chọn hình thức thanh toán</h4> <br>
        <form action="{{URL::TO('/order-place')}}" method="post" >
        {{csrf_field()}}
            <div class="payment-options">
                <span>
                    <label><input name="tt_option" value="1" type="checkbox"> Thanh toán bằng thẻ</label>
                </span>
                <span>
                    <label><input name="tt_option" value="2" type="checkbox"> Thanh toán bằng tiền mặt</label>
                </span>
                <span>
                <label><input name="tt_option" value="3" type="checkbox"> Thanh toán thẻ ghi nợ</label>
                </span> <br>
                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary">
            </div>
        </form>
    </div>
</section> <!--/#cart_items-->
@endsection	