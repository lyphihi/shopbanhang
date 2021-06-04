@extends('admin_layout')
@section('admin_content')
<h3>Thông tin người mua</h3>
<style>
    th {
  background-color: #595959;
}
</style>
<table class="table table-dark table-bordered, table-agile-info">
    <thead >
    <tr>
        <th>Tên người mua</th>
        <th>Số điện thoại</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$kh->kh_ten}}</td>
        <td>{{$kh->kh_sdt}}</td>
    </tr>
    </tbody>
</table>
<h3>Thông tin vận chuyển</h3>
<table class="table table-dark table-bordered, table-agile-info">
    <thead >
    <tr>
        <th>Tên người nhận</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{$hd->hd_ten}}</td>
        <td>{{$hd->hd_diachi}}</td>
        <td>{{$hd->hd_sdt}}</td>
    </tr>
    </tbody>
</table> <br><br>
<h3>Liệt kê chi tiết đơn hàng</h3>
<table class="table table-dark table-bordered, table-agile-info">
    <thead >
        <tr>
            <th>Thu tu</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
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
    

        <tr>
            <th>{{$i}}</th>
            <th>{{$details->sp_ten}}</th>
            <th>{{$details->sp_soluong}}</th>
            <th>{{$details->sp_gia}}</th>
            <th>{{number_format($subtotal,0,',','.')}}</th>
        </tr>
    </tbody>
</table>
@endsection

