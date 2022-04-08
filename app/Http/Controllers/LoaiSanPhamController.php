<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class LoaiSanPhamController extends Controller
{
    public function AuthLogin(){
        $ID_Admin = Session::get('ID_Admin');
        if($ID_Admin){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_loai_sp(){
        $this->AuthLogin();
    	return view('admin.add_loai_sp');
    }
    public function all_loai_sp(){
        $this->AuthLogin();
    	$all_loai_sp = DB::table('loaisanpham')->get();
    	$manager_loai_sp  = view('admin.all_loai_sp')->with('all_loai_sp',$all_loai_sp);
    	return view('admin_layout')->with('admin.all_loai_sp', $manager_loai_sp);


    }
    public function save_loai_sp(Request $request){
        $this->AuthLogin();
    	$loaisanpham = array();
    	$loaisanpham['Ten_LoaiSP'] = $request->Ten_LoaiSP;
        $loaisanpham['MoTa_LoaiSP'] = $request->MoTa_LoaiSP;
    	$loaisanpham['TrangThai_LoaiSP'] = $request->TrangThai_LoaiSP;

    	DB::table('loaisanpham')->insert($loaisanpham);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('add-loai-sp');
    }
    public function active_loai_sp($ID_LoaiSP){
        $this->AuthLogin();
       DB::table('loaisanpham')->where('ID_LoaiSP',$ID_LoaiSP)->update(['TrangThai_LoaiSP'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-loai-sp');
    }
    public function unactive_loai_sp($ID_LoaiSP){
        $this->AuthLogin();
        DB::table('loaisanpham')->where('ID_LoaiSP',$ID_LoaiSP)->update(['TrangThai_LoaiSP'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-loai-sp');

    }
    
    public function edit_loai_sp($ID_LoaiSP){
        $this->AuthLogin();
        $edit_loai_sp = DB::table('loaisanpham')->where('ID_LoaiSP',$ID_LoaiSP)->get();

        $manager_loai_sp  = view('admin.edit_loai_sp')->with('edit_loai_sp',$edit_loai_sp);

        return view('admin_layout')->with('admin.edit_loai_sp', $manager_loai_sp);
    }
    public function update_loai_sp(Request $request,$ID_LoaiSP){
        $this->AuthLogin();
        $loaisanpham = array();
        $loaisanpham['Ten_LoaiSP'] = $request->Ten_LoaiSP;
        $loaisanpham['MoTa_LoaiSP'] = $request->MoTa_LoaiSP;
       
        DB::table('loaisanpham')->where('ID_LoaiSP',$ID_LoaiSP)->update($loaisanpham);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-loai-sp');
    }
    public function delete_loai_sp($ID_LoaiSP){
        $this->AuthLogin();
        DB::table('loaisanpham')->where('ID_LoaiSP',$ID_LoaiSP)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-loai-sp');
    }

    //End Function Admin Page
    public function show_loaisp_home($ID_LoaiSP){ 
        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get(); 
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get(); 

        $loaisp_by_id = DB::table('sanpham')->join('loaisanpham','loaisanpham.ID_LoaiSP','=','sanpham.ID_LoaiSP')->where('loaisanpham.ID_LoaiSP',$ID_LoaiSP)->get();
         

        $Ten_LoaiSP = DB::table('loaisanpham')->where('loaisanpham.ID_LoaiSP',$ID_LoaiSP)->limit(1)->get();

        return view('pages.loaisanpham.show_loaisp')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp)->with('loaisp_by_id',$loaisp_by_id)->with('Ten_LoaiSP',$Ten_LoaiSP);
    }

}
