<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashbroad');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashbroad(){
        $this->AuthLogin();
        return view('admin.dashbroad');
    }
    public function dashbroad(Request $request){
        $admin_name = $request->admin_name;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_name',$admin_name)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashbroad');
        }
        else 
            Session::put('message','Tên đăng nhập hoặc mật khẩu chưa đúng!!!');
            return Redirect::to('/Admin');
    }
    public function logout(){
        $this->AuthLogin();
        return view('pages.home');
    }
}
