@extends('admin_layout')
@section('admin_content')
<h3>Thông tin người mua</h3>
<style>
    th {
  background-color: #595959;
}
</style>
<section class="sheet padding-10mm">
        <!-- Thông tin Cửa hàng -->
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td align="center"><img src="#" width="100px" height="100px" /></td>
                    <td align="center">
                        <b style="font-size: 2em;">Nền tảng - Hành trang tới Tương lai</b><br />
                        <small>Cung cấp các loại hoa theo nhiều chủ đề: sinh nhật, hoa cưới, chúc mừng,...</small><br />
                        <small>Giúp các bạn trao yêu thương đến người mình quan tâm.
                        </small>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- Thông tin đơn hàng -->
        <h3><p><i><u>Thông tin Đơn hàng</u></i></p></h3>
        <table border="0" width="100%" cellspacing="0">
            <tbody>
                <tr>
                    <td width="30%">Khách hàng:</td>
                    <td><b>{{$order_by_id->kh_ten}}</b></td>
                </tr>
                <tr>
                    <td>Địa chỉ:</td>
                    <td><b>{{$order_by_id->hd_diachi}}</b></td>
                </tr>
                <tr>
                    <td>Số điện thoại:</td>
                    <td><b>{{$order_by_id->hd_sdt}}</b></td>
                </tr>
                <tr>
                    <td>Tổng thành tiền:</td>
                    <td><b>{{$order_by_id->order_tong}}</b></td>
                </tr>
            </tbody>
        </table>
        <!-- Thông tin sản phẩm -->
        <h3><p><i><u>Chi tiết đơn hàng</u></i></p></h3>
        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <td align="right">{{$order_by_id->sp_ten}}</td>
                <td align="right">{{$order_by_id->sp_soluong}}</td>
                <td align="right">{{$order_by_id->sp_gia}}</td>
                <td align="right">{{$order_by_id->order_tong}}</td>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" align="right"><b>Tổng thành tiền</b></td>
                    <td align="right"><b>{{$order_by_id->order_tong}}</b></td>
                </tr>
            </tfoot>
        </table>
        <!-- Thông tin Footer -->
        <br />
        <table border="0" width="100%">
            <tbody>
                <tr>
                    <td align="center">
                        <small>Xin cám ơn Quý khách đã ủng hộ Shophoatuoi.vn, chúc quý khách luôn vui vẻ và hạnh phúc</small>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
@endsection

