<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashbroad');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        return view('pages.checkout.login_checkout')->with('nsx',$nsx);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['kh_ten'] = $request->kh_ten;
        $data['kh_email'] = $request->kh_email;
        $data['kh_matkhau'] = md5($request->kh_matkhau);
        $data['kh_sdt'] = $request->kh_sdt;

        $kh_id = DB::table('tbl_khachhang')->insertGetId($data);

        Session::put('kh_id',$kh_id);
        Session::put('kh_ten',$request->kh_ten);
        return Redirect::to('/checkout');
    }
    public function checkout(){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        return view('pages.checkout.checkout')->with('nsx',$nsx);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['hd_ten'] = $request->hd_ten;
        $data['hd_diachi'] = $request->hd_diachi;
        $data['hd_sdt'] = $request->hd_sdt;
        $data['hd_email'] = $request->hd_email;
        $data['hd_mota'] = $request->hd_mota;

        $hd_id = DB::table('tbl_hoadon')->insertGetId($data);

        Session::put('hd_id',$hd_id);
        return Redirect::to('/thanhtoan');
    }
    public function thanhtoan(){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        return view('pages.checkout.thanhtoan')->with('nsx',$nsx);
    }
    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request){
        $name = $request->name_tk;
        $password = md5($request->password_tk);
        $result = DB::table('tbl_khachhang')->where('kh_ten',$name)->where('kh_matkhau',$password)->first();
        
        if($result){
            Session::put('kh_id',$result->kh_id);
            return Redirect::to('/checkout');
        }else{
            return Redirect::to('/login-checkout');
        }
    }
    public function order_place(Request $request){
        //insert hình thức thanh toán
        $data = array();
        $data['tt_ten'] = $request->tt_option;
        $data['tt_mota'] = 'Đang chờ xử lý';
        $tt_id = DB::table('tbl_thanhtoan')->insertGetId($data);

        //insert hoá đơn
        $order_data = array();
        $order_data['kh_id'] = Session::get('kh_id');
        $order_data['hd_id'] = Session::get('hd_id');
        $order_data['tt_id'] = $tt_id;
        $order_data['order_tong'] = Cart::total();
        $order_data['order_trangthai'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert chi tiết hoá đơn
        $content = Cart::content();
        foreach($content as $v_content){
            $cthd_data = array();
            $cthd_data['order_id'] = $order_id;
            $cthd_data['sp_id'] = $v_content->id;
            $cthd_data['sp_ten'] = $v_content->name;
            $cthd_data['sp_gia'] = $v_content->price;
            $cthd_data['sp_soluong'] = $v_content->qty;
            DB::table('tbl_chitietdonhang')->insert($cthd_data);
        }
        if($data['tt_ten'] == 1){
            echo "Thanh toán bằng thẻ";
        }elseif($data['tt_ten'] == 2){
            //echo "Thanh toán bằng tiền mặt";
            Cart::destroy();
            $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
            return view('pages.checkout.handcash')->with('nsx',$nsx);
        }else{
            echo "Thanh toán thẻ ghi nợ";
        }
        //return Redirect::to('/thanhtoan');
    }
    public function qly_donhang(){
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_khachhang','tbl_khachhang.kh_id','=','tbl_order.kh_id')
        ->select('tbl_order.*','tbl_khachhang.kh_ten')
        ->orderby('order_id','desc')->get();
        $qly_donhang = view('admin.qly_donhang')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.qly_donhang',$qly_donhang);
    }
    public function edit_dh($order_id){
        $this->AuthLogin();
        // $order_by_id = DB::table('tbl_order')->join('tbl_khachhang','tbl_khachhang.kh_id','=','tbl_order.kh_id')
        // ->join('tbl_hoadon','tbl_hoadon.hd_id','=','tbl_order.hd_id')
        // ->join('tbl_chitietdonhang','tbl_order.order_id','=','tbl_chitietdonhang.order_id')
        // ->select('tbl_order.*','tbl_khachhang.*','tbl_hoadon.*','tbl_chitietdonhang.*')
        // ->get();
        $order_details=  DB::table('tbl_chitietdonhang')->where('order_id', $order_id)->get();
        $order=  DB::table('tbl_order')->where('order_id', $order_id)->get();
        // $hd_id-=  DB::table('tbl_hoadon')->where('hd_id', $hd_id)->get();
        //$kh=  DB::table('tbl_hoadon')::where('hd_id', $hd_id)->get();
        foreach($order as $key => $ord ){
            $kh_id=$ord->kh_id;
            $hd_id=$ord->hd_id;
            $hd_id=$ord->hd_id;
        }
        $kh=DB::table('tbl_khachhang')->where('kh_id', $kh_id)->first();
        $hd=DB::table('tbl_hoadon')->where('hd_id', $hd_id)->first();

        // echo '<pre>';
        // print_r($order_by_id);
        // echo '</pre>';
        
        // $edit_dh = view('admin.edit_dh')->with('order_by_id',$order_by_id);
        // return view('admin_layout')->with('admin.edit_dh',$edit_dh);

        return view('admin.edit_dh')->with('order_details',$order_details)->with('order',$order)->with('kh',$kh)->with('hd',$hd);
    }
        
}
