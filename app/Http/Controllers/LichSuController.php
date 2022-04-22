<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

session_start();
class LichSuController extends Controller
{

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

        return view('pages.lichsu.lichsudonhang', compact('list', 'loaisanpham', 'thuonghieusp'));
    }

    public function chitietDH($id)
    {
        $list = DB::table('chitietdonhang')->where('ID_DonHang', $id)->get();

        $loaisanpham = DB::table('loaisanpham')->where('TrangThai_LoaiSP', '0')->orderby('ID_LoaiSP', 'desc')->get();
        $thuonghieusp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu', '0')->orderby('ID_ThuongHieu', 'desc')->get();

        return view('pages.lichsu.chitietdathang', compact('list', 'loaisanpham', 'thuonghieusp'));
    }




}
