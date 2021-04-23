<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class SanphamController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashbroad');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_sp(){
        $this->AuthLogin();
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        return view('admin.add_sp')->with('nsx',$nsx);
    }
    public function all_sp(){
        $this->AuthLogin();
        $all_sp = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        ->orderby('sp_id','desc')->get();
        $manager_sp = view('admin.all_sp')->with('all_sp',$all_sp);
        return view('admin_layout')->with('admin.all_sp',$manager_sp);
    }
    public function save_sp(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['sp_ten'] = $request->sp_ten;
        $data['nsx_id'] = $request->nsx_id;
        $data['sp_mota'] = $request->sp_mota;
        $data['sp_gia'] = $request->sp_gia;
        $data['sp_mau'] = $request->sp_mau;
        $data['sp_trangthai'] = $request->sp_trangthai;
        $get_ha = $request->file('sp_ha');
        
        if($get_ha){
            $get_ten_ha = $get_ha->getClientOriginalName();
            $ten_ha = current(explode('.',$get_ten_ha));
            $new_ha = $ten_ha.rand(0,99).'.'.$get_ha->getClientOriginalExtension();
            $get_ha->move('public/uploads/product',$new_ha);
            $data['sp_ha'] = $new_ha;
            DB::table('tbl_sanpham')->insert($data);
            Session::flash('alert-success','Thêm sản phẩm thành công...!');
            //Session::put('message','Thêm sản phẩm thành công...!');
            return Redirect::to('all-sp');
        }
        $data['sp_ha'] = '';

        DB::table('tbl_sanpham')->insert($data);
        Session::flash('alert-success','Thêm sản phẩm thành công...!');
        //Session::put('message','Thêm sản phẩm thành công...!');
        return Redirect::to('add-sp');
        print_r($data);
    }
    public function edit_sp($sp_id){
        $this->AuthLogin();
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        $edit_sp = DB::table('tbl_sanpham')->where('sp_id',$sp_id)->get();
        $manager_sp = view('admin.edit_sp')->with('edit_sp',$edit_sp)->with('nsx',$nsx);
        return view('admin_layout')->with('admin.edit_sp',$manager_sp);
    }
    public function update_sp(Request $request, $sp_id){
        $this->AuthLogin();
        $data = array();
        $data['sp_ten'] = $request->sp_ten;
        $data['nsx_id'] = $request->nsx_id;
        $data['sp_mota'] = $request->sp_mota;
        $data['sp_gia'] = $request->sp_gia;
        $data['sp_mau'] = $request->sp_mau;
        $data['sp_trangthai'] = $request->sp_trangthai;
        $get_ha = $request->file('sp_ha');
        
        if($get_ha){
            $get_ten_ha = $get_ha->getClientOriginalName();
            $ten_ha = current(explode('.',$get_ten_ha));
            $new_ha = $ten_ha.rand(0,99).'.'.$get_ha->getClientOriginalExtension();
            $get_ha->move('public/uploads/product',$new_ha);
            $data['sp_ha'] = $new_ha;
            DB::table('tbl_sanpham')->where('sp_id',$sp_id)->update($data);
            Session::flash('alert-success','Cập nhật sản phẩm thành công...!');
            //Session::put('message','Cập nhật sản phẩm thành công...!');
            return Redirect::to('all-sp');
        }
        DB::table('tbl_sanpham')->where('sp_id',$sp_id)->update($data);
        Session::flash('alert-success','Cập nhật sản phẩm thành công...!');
        return Redirect::to('/all-sp');
    }
    public function delete_sp($sp_id){
        $this->AuthLogin();
        DB::table('tbl_sanpham')->where('sp_id',$sp_id)->delete();
        Session::flash('alert-success','Xoá sản phẩm thành công...!');
        //Session::put('message','Xoá sản phẩm thành công...!');
        return Redirect::to('/all-sp');
    }
    //End Admin pages
    public function chi_tiet_sp($sp_id){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        $details_sp = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        ->where('tbl_sanpham.sp_id',$sp_id)->get();

        foreach($details_sp as $key => $value){
            $nsx_id = $value->nsx_id;
        }
        $related_sp = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        ->where('tbl_nhasanxuat.nsx_id',$nsx_id)->whereNotIn('tbl_sanpham.sp_id',[$sp_id])->get();
        //whereNotIn trừ cho sản phẩm đã có rồi
        return view('pages.sanpham.show_details')->with('nsx',$nsx)->with('details_sp',$details_sp)->with('related',$related_sp);
    }
}
