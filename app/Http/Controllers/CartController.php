<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request){
        
        $spId = $request->spid_hidden;
        $quantity = $request->qty;
        $sp_info = DB::table('tbl_sanpham')->where('sp_id',$spId)->first();
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        $data['id'] = $sp_info->sp_id;
        $data['qty'] = $quantity;
        $data['name'] = $sp_info->sp_ten;
        $data['price'] = $sp_info->sp_gia;
        $data['weight'] = '123';
        $data['options']['image'] = $sp_info->sp_ha;
        Cart::add($data);
        return Redirect::to('/show-cart');
    }
    public function show_cart(){
        $nsx = DB::table('tbl_nhasanxuat')->orderby('nsx_id','desc')->get();
        return view('pages.cart.show_cart')->with('nsx',$nsx);
    }
    public function delete_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }
}
