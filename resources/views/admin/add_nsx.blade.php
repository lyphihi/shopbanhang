@extends('admin_layout')
@section('admin_content')
<h1>Thêm mới Nhà sản xuất</h1>
    
<form class="panel-body" name="frmCreate" id="frmCreate" method="post" action="{{URL::TO('/save-nsx')}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Tên nhà sản xuất</label>
        <input type="text" class="form-control" id="nsx_ten" name="nsx_ten" value="" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Mô tả nhà sản xuất</label>
        <input type="text" class="form-control" id="nsx_mota" name="nsx_mota" value="">
    </div>
    <button name="add_nsx" type="submit" class="btn btn-info">Submit</button>
</form>
@endsection


