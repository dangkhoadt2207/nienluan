<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ThuongHieuSanPhamController extends Controller
{
    public function AuthLogin(){
        $ID_Admin = Session::get('ID_Admin');
        if($ID_Admin){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_thuong_hieu(){
        $this->AuthLogin();
    	return view('admin.add_thuong_hieu');
    }
    public function all_thuong_hieu(){
        $this->AuthLogin();
    	$all_thuong_hieu = DB::table('thuonghieusp')->get();
    	$manager_thuong_hieu  = view('admin.all_thuong_hieu')->with('all_thuong_hieu',$all_thuong_hieu);
    	return view('admin_layout')->with('admin.all_thuong_hieu', $manager_thuong_hieu);


    }
    public function save_thuong_hieu(Request $request){
        $this->AuthLogin();
    	$thuonghieu = array();
    	$thuonghieu['Ten_ThuongHieu'] = $request->Ten_ThuongHieu;
    	$thuonghieu['MoTa_ThuongHieu'] = $request->MoTa_ThuongHieu;
    	$thuonghieu['TrangThai_ThuongHieu'] = $request->TrangThai_ThuongHieu;

    	DB::table('thuonghieusp')->insert($thuonghieu);
    	Session::put('message','Thêm thương hiệu sản phẩm thành công');
    	return Redirect::to('add-thuong-hieu');
    }
    public function unactive_thuong_hieu($ID_ThuongHieu){
        $this->AuthLogin();
        DB::table('thuonghieusp')->where('ID_ThuongHieu',$ID_ThuongHieu)->update(['TrangThai_ThuongHieu'=>1]);
        Session::put('message','Không kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-thuong-hieu');

    }
    public function active_thuong_hieu($ID_ThuongHieu){
        $this->AuthLogin();
        DB::table('thuonghieusp')->where('ID_ThuongHieu',$ID_ThuongHieu)->update(['TrangThai_ThuongHieu'=>0]);
        Session::put('message','Kích hoạt thương hiệu sản phẩm thành công');
        return Redirect::to('all-thuong-hieu');

    }
    public function edit_thuong_hieu($ID_ThuongHieu){
        $this->AuthLogin();
        $edit_thuong_hieu = DB::table('thuonghieusp')->where('ID_ThuongHieu',$ID_ThuongHieu)->get();

        $manager_thuong_hieu  = view('admin.edit_thuong_hieu')->with('edit_thuong_hieu',$edit_thuong_hieu);

        return view('admin_layout')->with('admin.edit_thuong_hieu', $manager_thuong_hieu);
    }
    public function update_thuong_hieu(Request $request,$ID_ThuongHieu){
        $this->AuthLogin();
      
        $thuonghieu = array();
        $thuonghieu['Ten_ThuongHieu'] = $request->Ten_ThuongHieu;
        $thuonghieu['MoTa_ThuongHieu'] = $request->MoTa_ThuongHieu;
        
        DB::table('thuonghieusp')->where('ID_ThuongHieu',$ID_ThuongHieu)->update($thuonghieu);
        Session::put('message','Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-thuong-hieu');
    }
    public function delete_thuong_hieu($ID_ThuongHieu){
        $this->AuthLogin();
        DB::table('thuonghieusp')->where('ID_ThuongHieu',$ID_ThuongHieu)->delete();
        Session::put('message','Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-thuong-hieu');
    }

    //End Function Admin Page
    public function show_thuonghieu_home($ID_ThuongHieu){ 
        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','asc')->get(); 
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','asc')->get(); 

        $thuonghieusp_by_id = DB::table('sanpham')->join('thuonghieusp','thuonghieusp.ID_ThuongHieu','=','sanpham.ID_ThuongHieu')->where('thuonghieusp.ID_ThuongHieu',$ID_ThuongHieu)->get();
         
         $Ten_ThuongHieu = DB::table('thuonghieusp')->where('thuonghieusp.ID_ThuongHieu',$ID_ThuongHieu)->limit(1)->get();

        return view('pages.thuonghieu.show_thuonghieu')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp)->with('thuonghieusp_by_id',$thuonghieusp_by_id)->with('Ten_ThuongHieu',$Ten_ThuongHieu);
    }
}
