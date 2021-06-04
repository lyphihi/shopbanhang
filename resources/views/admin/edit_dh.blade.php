@extends('admin_layout')
@section('admin_content')
<h3>Thông tin người mua</h3>
<style>
    th {
  background-color: #595959;
}
</style>
<section class="sheet padding-10mm">
        <!-- Thông tin Cửa hàng -->
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center"><img src="{{asset('frontend/img/logo.png')}}" width="100px" height="100px" /></td>
                    <td align="center">
                        <b style="font-size: 2em;">Eshopper</b><br />
                        <small>Cung cấp các sản phẩm mới được ra mắt từ các hãng điện thoại đến từ nhiều nước</small><br />
                        <small>Giúp các bạn tìm được sản phẩm mình yêu thích.
                        </small>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Thông tin đơn hàng -->
        <h3><p><i><u>Thông tin Đơn hàng</u></i></p></h3>
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td width="30%">Tên người mua:</td>
                    <td><b>{{$kh->kh_ten}}</b></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><b>{{$hd->hd_diachi}}</b></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><b>{{$hd->hd_sdt}}</b></td>
                </tr>
                <tr>
                    <td>Tên người nhận:</td>
                    <td><b>{{$hd->hd_ten}}</b></td>
                </tr>
            </tbody>
        </table>
        <!-- Thông tin sản phẩm -->
        <h3><p><i><u>Chi tiết đơn hàng</u></i></p></h3>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>Thứ tự</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
            @php 
            $i=0;
            $total=0;
            @endphp
            @foreach($order_details as $key => $details )
            @php
            $i++;
            $subtotal=$details->sp_soluong*$details->sp_gia;
            $total+=$subtotal;
            @endphp
            @endforeach
                <td>{{$i}}</td>
                <td align="right">{{$details->sp_ten}}</td>
                <td align="right">{{$details->sp_soluong}}</td>
                <td align="right">{{$details->sp_gia}}</td>
                <td align="right">{{number_format($subtotal,0,',','.')}}</td>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" align="right"><b>Tổng thành tiền</b></td>
                    <td align="right"><b>{{number_format($subtotal,0,',','.')}}</b></td>
                </tr>
            </tfoot>
        </table>
        <!-- Thông tin Footer -->
        <br />
        <table border="0" width="100%">
            <tbody>
                <tr>
                    <td align="center">
                        <small>Xin cám ơn Quý khách đã ủng hộ Eshopper, chúc quý khách luôn vui vẻ và hạnh phúc</small>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection
