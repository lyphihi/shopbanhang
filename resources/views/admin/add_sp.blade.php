@extends('admin_layout')
@section('admin_content')
<h2 style="text-align: center">Thêm mới sản phẩm</h2>
    
<form class="panel-body" name="frmCreate" id="frmCreate" method="post" action="{{URL::TO('/save-sp')}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nhà sản xuất</label>
        <select name="nsx_id" id="nsx_id">
            @foreach($nsx as $key => $nsx)
                <option value="{{($nsx->nsx_id)}}">{{($nsx->nsx_ten)}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Mô tả sản phẩm</label>
        <input type="text" class="form-control" id="sp_mota" name="sp_mota" value="">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Giá</label>
        <input type="text" class="form-control" id="sp_gia" name="sp_gia" value="">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Màu</label>
        <input type="text" class="form-control" id="sp_mau" name="sp_mau" value="">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
        <select name="sp_trangthai" id="sp_trangthai">
            <option value="1" >Khoá</option>
            <option value="2" >Khả dụng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Hình ảnh</label>
        <input type="file" class="form-control" id="sp_ha" name="sp_ha" value="">
    </div>
    <button name="add_sp" type="submit" class="btn btn-info">Submit</button>
</form>
@endsection


