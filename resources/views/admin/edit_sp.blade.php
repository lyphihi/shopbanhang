@extends('admin_layout')
@section('admin_content')
<h1>Cập nhật sản phẩm</h1>
@foreach($edit_sp as $key => $edit_value)
<form class="panel-body" name="frmCreate" id="frmCreate" method="post" action="{{URL::TO('/update-sp/'.$edit_value->sp_id)}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{$edit_value->sp_ten}}" />
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Nhà sản xuất</label>
        <select name="nsx_id" id="nsx_id">
            @foreach($nsx as $key => $nsx)
                @if($nsx->nsx_id==$edit_value->nsx_id)
                <option selected value="{{($nsx->nsx_id)}}">{{($nsx->nsx_ten)}}</option>
                @else
                <option value="{{($nsx->nsx_id)}}">{{($nsx->nsx_ten)}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Mô tả sản phẩm</label>
        <input type="text" class="form-control" id="sp_mota" name="sp_mota" value="{{$edit_value->sp_mota}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Giá</label>
        <input type="text" class="form-control" id="sp_gia" name="sp_gia" value="{{$edit_value->sp_gia}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Màu</label>
        <input type="text" class="form-control" id="sp_mau" name="sp_mau" value="{{$edit_value->sp_mau}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
        <select name="sp_trangthai" id="sp_trangthai">
            <option value="1" {{ $edit_value->sp_trangthai == 1 ? 'selected' : '' }} >Khoá</option>
            <option value="2" {{ $edit_value->sp_trangthai == 2 ? 'selected' : '' }}>Khả dụng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Hình ảnh</label>
        <input type="file" class="form-control" id="sp_ha" name="sp_ha" >
        <img src="{{URL::TO('public/uploads/product/'.$edit_value->sp_ha)}}" width="100px" height="100px" alt="">
    </div>
    <button name="update_sp" type="submit" class="btn btn-info">Submit</button>
</form>
@endforeach
@endsection


