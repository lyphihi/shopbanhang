@extends('admin_layout')
@section('admin_content')
<style>
    th {
  background-color: #595959;
}
</style>
<h2 style="text-align: center">Danh sách sản phẩm</h2> 
    
    @if(Session::has('alert-success'))
    <div class="alert alert-success" role="alert" >
        {{Session::get('alert-success')}}
    </div>
    @endif
<a  class="btn btn-info" href="{{URL::TO('/add-sp')}}">Thêm mới</a> <br><br>
<table class="table table-dark table-bordered, table-agile-info">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Nhà sản xuất</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Màu</th>
            <th>Trạng thái sản phẩm</th>
            <th>Hành động</th>
        </tr>
    </thead>
    @foreach($all_sp as $key => $sp)
    <tbody>
        <tr>
            <td>{{$sp->sp_id}}</td>
            <td>{{$sp->sp_ten}}</td>
            <td>{{$sp->nsx_ten}}</td>
            <td>{{$sp->sp_gia}}</td> 
            <td><img src="public/uploads/product/{{$sp->sp_ha}}" width="100px" height="100px" alt=""></td>
            <td>{{$sp->sp_mau}}</td>
            <td>
                <?php
                    if($sp->sp_trangthai==1){
                        echo 'Khoá';
                    }
                    else {echo 'Khả dụng';}
                ?>
            </td>
            <td>
                <a href="{{URL::TO('/edit-sp/'.$sp->sp_id)}}"  class="btn btn-success pull-left">Sửa</a>    
                <a onclick="return confirm('Bạn chắc chắn muốn xoá??')" href="{{URL::TO('/delete-sp/'.$sp->sp_id)}}" class="btn btn-danger pull-left">Xóa</a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
@endsection


