@extends('admin_layout')
@section('admin_content')
<h1>Danh sách nhà sản xuất</h1>
    <?php
		// $message = Session::get('message');
		// if($message){
		// 	echo '<span class="text-alert">',$message,'</span>';
		// 	Session::put('message',null);
		// }
	?>
<a class="btn btn-primary" href="{{URL::TO('/add-nsx')}}">Thêm mới</a> 
<table class="table table-striped table-bordered, table-agile-info">
    <tr>
        <td>Mã nhà sản xuất</td>
        <td>Tên nhà sản xuất</td>
        <td>Mô tả nhà sản xuất</td>
        <td>Hành động</td>
    </tr>
    @foreach($all_nsx as $key => $nsx)
    <tr>
        <td>{{$nsx->nsx_id}}</td>
        <td>{{$nsx->nsx_ten}}</td>
        <td>{{$nsx->nsx_mota}}</td>
        <td>
            <a href="{{URL::TO('/edit-nsx/'.$nsx->nsx_id)}}" class="btn btn-primary pull-left">Sửa</a>
            <a onclick="return confirm('Bạn chắc chắn muốn xoá??')" href="{{URL::TO('/delete-nsx/'.$nsx->nsx_id)}}" class="btn btn-danger pull-left">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection


