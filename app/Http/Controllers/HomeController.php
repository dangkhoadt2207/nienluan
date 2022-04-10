<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','asc')->get(); 
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','asc')->get(); 

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','asc')->get();
        
         $all_sanpham = DB::table('sanpham')->where('TrangThai_SP','0')->orderby('ID_SP','desc')->limit(6)->get(); 

    	return view('pages.home')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp)->with('all_sanpham',$all_sanpham);
    }
    public function search(Request $request){

        $keywords = $request->keywords_submit;

       $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','asc')->get(); 
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','asc')->get(); 

        $search_sanpham = DB::table('sanpham')->where('Ten_SP','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp)->with('search_sanpham',$search_sanpham);

    }
}
