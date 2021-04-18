<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class CheckoutController extends Controller
{
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
}
