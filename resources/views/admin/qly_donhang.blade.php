@extends('admin_layout')
@section('admin_content')
<h1>Liệt kê đơn hàng</h1>
<style>
    th {
  background-color: #595959;
}
</style>
<table class="table table-dark table-bordered, table-agile-info">
    <thead >
    <tr>
        <th>Tên người đặt</th>
        <th>Tông giá tiền</th>
        <th>Tình trạng đơn hàng</th>
        <th>Hành động</th>
    </tr>
    </thead>
    @foreach($all_order as $key => $order)
    <tbody>
    <tr>
        <td>{{$order->kh_ten}}</td>
        <td>{{$order->order_tong}}</td>
        <td>{{$order->order_trangthai}}</td>
        <td>
            <a href="{{URL::TO('/edit-dh/'.$order->order_id)}}" class="btn btn-primary pull-left">Xem hoá đơn</a>
            <!-- <a onclick="return confirm('Bạn chắc chắn muốn xoá??')" href="{{URL::TO('/delete-dh/'.$order->order_id)}}" class="btn btn-danger pull-left">Xóa</a> -->
        </td>
    </tr>
    </tbody>
    @endforeach
</table>
@endsection


