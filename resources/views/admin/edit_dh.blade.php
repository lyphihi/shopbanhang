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
        <td>{{$order_by_id->kh_ten}}</td>
        <td>{{$order_by_id->kh_sdt}}</td>
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
        <td>{{$order_by_id->hd_ten}}</td>
        <td>{{$order_by_id->hd_diachi}}</td>
        <td>{{$order_by_id->hd_sdt}}</td>
    </tr>
    </tbody>
</table> <br><br>
<h3>Liệt kê chi tiết đơn hàng</h3>
<table class="table table-dark table-bordered, table-agile-info">
    <thead >
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$order_by_id->sp_ten}}</td>
            <td>{{$order_by_id->sp_soluong}}</td>
            <td>{{$order_by_id->sp_gia}}</td>
            <td>{{$order_by_id->order_tong}}</td>
        </tr>
    </tbody>
</table>
@endsection


