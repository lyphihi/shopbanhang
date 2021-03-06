<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        // $all_sp = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        // ->orderby('sp_id','desc')->get();
        $sp = DB::table('tbl_sanpham')->where('sp_trangthai','2')->orderby('sp_id','desc')->limit(6)->get();
        return view('pages.home')->with('nsx',$nsx)->with('sp',$sp);
    }
    public function tim_kiem(Request $request){
        $keywords = $request->tukhoa;
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        // $all_sp = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        // ->orderby('sp_id','desc')->get();
        $tk_sp = DB::table('tbl_sanpham')->where('sp_ten','like','%'.$keywords.'%')->get();
        return view('pages.sanpham.timkiem')->with('nsx',$nsx)->with('tk_sp',$tk_sp);
    }
    public function sp(){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        // $all_sp = DB::table('tbl_sanpham')->join('tbl_nhasanxuat','tbl_nhasanxuat.nsx_id','=','tbl_sanpham.nsx_id')
        // ->orderby('sp_id','desc')->get();
        $sp = DB::table('tbl_sanpham')->where('sp_trangthai','2')->orderby('sp_id','desc')->get();
        return view('pages.spham')->with('nsx',$nsx)->with('sp',$sp);
    }
}

