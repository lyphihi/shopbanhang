@extends('admin_layout')
@section('admin_content')
<h1>Danh sách sản phẩm</h1>
    <?php
		// $message = Session::get('message');
		// if($message){
		// 	echo '<span class="text-alert">',$message,'</span>';
		// 	Session::put('message',null);
		// }
	?>
    @if(Session::has('alert-success'))
    <div class="alert alert-success" role="alert" >
        {{Session::get('alert-success')}}
    </div>
    @endif
<a class="btn btn-primary" href="{{URL::TO('/add-sp')}}">Thêm mới</a> 
<table class="table table-striped table-bordered, table-agile-info">
    <tr>
        <td>Mã sản phẩm</td>
        <td>Tên sản phẩm</td>
        <td>Nhà sản xuất</td>
        <td>Giá</td>
        <td>Hình ảnh</td>
        <td>Màu</td>
        <td>Trạng thái sản phẩm</td>
        <td>Hành động</td>
    </tr>
    @foreach($all_sp as $key => $sp)
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
            <a href="{{URL::TO('/edit-sp/'.$sp->sp_id)}}" class="btn btn-primary pull-left">Sửa</a>
            <a onclick="return confirm('Bạn chắc chắn muốn xoá??')" href="{{URL::TO('/delete-sp/'.$sp->sp_id)}}" class="btn btn-danger pull-left">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection


