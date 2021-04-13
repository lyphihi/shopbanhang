@extends('admin_layout')
@section('admin_content')
<h1>Cập nhật nhà sản xuất</h1>
@foreach($edit_nsx as $key => $edit_value)
<form class="panel-body" name="frmCreate" id="frmCreate" method="post" action="{{URL::TO('/update-nsx/'.$edit_value->nsx_id)}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Tên nhà sản xuất</label>
        <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" value="{{$edit_value->nsx_ten}}" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Mô tả nhà sản xuất</label>
        <input type="text" class="form-control" id="nsx_mota" name="nsx_mota" value="{{$edit_value->nsx_mota}}">
    </div>
    <button name="update_nsx" type="submit" class="btn btn-info">Submit</button>
</form>
@endforeach
@endsection


