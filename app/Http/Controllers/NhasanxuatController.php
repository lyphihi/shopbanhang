<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();
class NhasanxuatController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashbroad');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_nsx(){
        $this->AuthLogin();
        return view('admin.add_nsx');
    }
    public function all_nsx(){
        $this->AuthLogin();
        $all_nsx = DB::table('tbl_nhasanxuat')->get();
        $manager_nsx = view('admin.all_nsx')->with('all_nsx',$all_nsx);
        return view('admin_layout')->with('admin.all_nsx',$manager_nsx);
    }
    public function save_nsx(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['nsx_ten'] = $request->nsx_ten;
        $data['nsx_mota'] = $request->nsx_mota;


        DB::table('tbl_nhasanxuat')->insert($data);
        Session::flash('alert-success','Thêm nhà sản xuất thành công...!');
        return Redirect::to('/all-nsx');
        // print_r($data);
    }
    public function edit_nsx($nsx_id){
        $this->AuthLogin();
        $edit_nsx = DB::table('tbl_nhasanxuat')->where('nsx_id',$nsx_id)->get();
        $manager_nsx = view('admin.edit_nsx')->with('edit_nsx',$edit_nsx);
        return view('admin_layout')->with('admin.edit_nsx',$manager_nsx);
    }
    public function update_nsx(Request $request, $nsx_id){
        $this->AuthLogin();
        $data = array();
        $data['nsx_ten'] = $request->nsx_ten;
        $data['nsx_mota'] = $request->nsx_mota;

        DB::table('tbl_nhasanxuat')->where('nsx_id',$nsx_id)->update($data);
        Session::flash('alert-success','Cập nhật nhà sản xuất thành công...!');
        return Redirect::to('/all-nsx');
    }
    public function delete_nsx($nsx_id){
        $this->AuthLogin();
        DB::table('tbl_nhasanxuat')->where('nsx_id',$nsx_id)->delete();
        Session::flash('alert-success','Xoá nhà sản xuất thành công...!');
        return Redirect::to('/all-nsx');
    }
    //end function Admin pages
    public function show_nsx_home($nsx_id){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        $nsx_by_id = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        ->where('tbl_sanpham.nsx_id',$nsx_id)->get();
        $nsx_name = DB::table('tbl_nhasanxuat')->where('tbl_nhasanxuat.nsx_id',$nsx_id)->limit(1)->get();
        return view('pages.nsx.show_sanpham')->with('nsx',$nsx)->with('nsx_by_id',$nsx_by_id)->with('nsx_name',$nsx_name);
    }
}
