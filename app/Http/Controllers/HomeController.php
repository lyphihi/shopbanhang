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
        $sp = DB::table('tbl_sanpham')->where('sp_trangthai','2')->orderby('sp_id','desc')->limit(4)->get();
        return view('pages.home')->with('nsx',$nsx)->with('sp',$sp);
    }
}
