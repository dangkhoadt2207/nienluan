<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

session_start();
class GioHangController extends Controller
{
    public function save_giohang(Request $request)
    {
        $productId = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('sanpham')->where('ID_SP', $productId)->first();



        $data['id'] = $product_info->ID_SP;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->Ten_SP;
        $data['price'] = $product_info->Gia_SP;
        $data['weight'] = $product_info->Gia_SP;
        $data['options']['image'] = $product_info->HinhAnh_SP;
        Cart::add($data);
        Cart::setGlobalTax(0);
        // Cart::destroy();
        return Redirect::to('/show-giohang');
    }
    public function show_giohang()
    {

        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP', '0')->orderby('ID_LoaiSP', 'desc')->get();
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu', '0')->orderby('ID_ThuongHieu', 'desc')->get();

        return view('pages.giohang.show_giohang')->with('loaisanpham', $loai_sp)->with('thuonghieusp', $thuonghieu_sp);
    }

    public function show_giohang1(Request $request, $id)
    {

        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP', '0')->orderby('ID_LoaiSP', 'desc')->get();
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu', '0')->orderby('ID_ThuongHieu', 'desc')->get();

        $quantity = 1;
        $product_info = DB::table('sanpham')->where('ID_SP', $id)->first();


        $data['id'] = $id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->Ten_SP;
        $data['price'] = $product_info->Gia_SP;
        $data['weight'] = $product_info->Gia_SP;
        $data['options']['image'] = $product_info->HinhAnh_SP;
        Cart::add($data);
        Cart::setGlobalTax(0);
        // Cart::destroy();
        return Redirect::to('/show-giohang');


        return view('pages.giohang.show_giohang')->with('loaisanpham', $loai_sp)->with('thuonghieusp', $thuonghieu_sp);
    }

    public function delete_to_giohang($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-giohang');
    }
    public function update_giohang_soluong(Request $request)
    {
        $rowId = $request->rowId_giohang;
        $product_info = DB::table('sanpham')->where('ID_SP', $request->rowId)->first();

        $qty = $request->cart_quantity;

        // if(qty < product_info->SoLuong_SP )
        Cart::update($rowId, $qty);
        return Redirect::to('/show-giohang');
    }



    public function lichsu(Request $request)
    {

        $list = DB::table('donhang as a')
            ->leftjoin('khachhang as b', 'a.ID_KhachHang', 'b.ID_KhachHang')
            ->select('a.*', 'b.HoTen_KhachHang')
            ->where('a.ID_KhachHang', $request->id)
            ->orderby('ID_DonHang', 'desc')
            ->get();

        $loaisanpham = DB::table('loaisanpham')->where('TrangThai_LoaiSP', '0')->orderby('ID_LoaiSP', 'asc')->get();
        $thuonghieusp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu', '0')->orderby('ID_ThuongHieu', 'asc')->get();

        return view('pages.checkout.lichsudonhang', compact('list', 'loaisanpham', 'thuonghieusp'));
    }

    public function chitietDH($id)
    {
        $list = DB::table('chitietdonhang')->where('ID_DonHang', $id)->get();

        $loaisanpham = DB::table('loaisanpham')->where('TrangThai_LoaiSP', '0')->orderby('ID_LoaiSP', 'desc')->get();
        $thuonghieusp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu', '0')->orderby('ID_ThuongHieu', 'desc')->get();

        return view('pages.checkout.chitietdathang', compact('list', 'loaisanpham', 'thuonghieusp'));
    }




}
