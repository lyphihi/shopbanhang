@extends('admin_layout')
@section('admin_content')
<style>
    th {
  background-color: #595959;
}
</style>
<h2 style="text-align: center">Danh sách nhà sản xuất</h2>
    @if(Session::has('alert-success'))
        <div class="alert alert-success" role="alert" >
            {{Session::get('alert-success')}}
        </div>
    @endif
<a class="btn btn-info" href="{{URL::TO('/add-nsx')}}">Thêm mới</a> <br><br>
<table class="table table-striped table-bordered, table-agile-info">
    <tr>
        <th>Mã nhà sản xuất</th>
        <th>Tên nhà sản xuất</th>
        <th>Mô tả nhà sản xuất</th>
        <th>Hành động</th>
    </tr>
    @foreach($all_nsx as $key => $nsx)
    <tr>
        <td>{{$nsx->nsx_id}}</td>
        <td>{{$nsx->nsx_ten}}</td>
        <td>{{$nsx->nsx_mota}}</td>
        <td>
            <a href="{{URL::TO('/edit-nsx/'.$nsx->nsx_id)}}" class="btn btn-success pull-left">Sửa</a>
            <a onclick="return confirm('Bạn chắc chắn muốn xoá??')" href="{{URL::TO('/delete-nsx/'.$nsx->nsx_id)}}" class="btn btn-danger pull-left">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>
@endsection


