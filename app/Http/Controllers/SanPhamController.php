<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class SanPhamController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('ID_Admin');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_sanpham(){
        $this->AuthLogin();
        $loai_sp = DB::table('loaisanpham')->orderby('ID_LoaiSP','desc')->get(); 
        $thuonghieu_sp = DB::table('thuonghieusp')->orderby('ID_ThuongHieu','desc')->get(); 
       

        return view('admin.add_sanpham')->with('loai_sp', $loai_sp)->with('thuonghieu_sp',$thuonghieu_sp);
    	

    }
    public function all_sanpham(){
        $this->AuthLogin();
    	$all_sanpham = DB::table('sanpham')
        ->join('loaisanpham','loaisanpham.ID_LoaiSP','=','sanpham.ID_LoaiSP')
        ->join('thuonghieusp','thuonghieusp.ID_ThuongHieu','=','sanpham.ID_ThuongHieu')
        ->orderby('sanpham.ID_SP','desc')->get();
    	$manager_sanpham  = view('admin.all_sanpham')->with('all_sanpham',$all_sanpham);
    	return view('admin_layout')->with('admin.all_sanpham', $manager_sanpham);

    }
    public function save_sanpham(Request $request){
         $this->AuthLogin();
    	$data = array();
    	$data['Ten_SP'] = $request->Ten_SP;
        $data['ID_LoaiSP'] = $request->ID_LoaiSP;
    	$data['ID_ThuongHieu'] = $request->ID_ThuongHieu;
        $data['SoLuong_SP'] = $request->SoLuong_SP;
        $data['Gia_SP'] = $request->Gia_SP;
        $data['NoiDung_SP'] = $request->NoiDung_SP;
        $data['MoTa_SP'] = $request->MoTa_SP;
        $data['TrangThai_SP'] = $request->TrangThai_SP;
        $get_image = $request->file('HinhAnh_SP');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/sanpham',$new_image);
            $data['HinhAnh_SP'] = $new_image;
            DB::table('sanpham')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-sanpham');
        }
        $data['HinhAnh_SP'] = '';
    	DB::table('sanpham')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-sanpham');
    }
    public function unactive_sanpham($ID_SP){
         $this->AuthLogin();
        DB::table('sanpham')->where('ID_SP',$ID_SP)->update(['TrangThai_SP'=>1]);
        Session::put('message','Không kích hoạt sản phẩm thành công');
        return Redirect::to('all-sanpham');

    }
    public function active_sanpham($ID_SP){
         $this->AuthLogin();
        DB::table('sanpham')->where('ID_SP',$ID_SP)->update(['TrangThai_SP'=>0]);
        Session::put('message','Kích hoạt sản phẩm thành công');
        return Redirect::to('all-sanpham');
    }
    public function edit_sanpham($ID_SP){
         $this->AuthLogin();
        $loaisanpham = DB::table('loaisanpham')->orderby('ID_LoaiSP','desc')->get(); 
        $thuonghieusp = DB::table('thuonghieusp')->orderby('ID_ThuongHieu','desc')->get(); 

        $edit_sanpham = DB::table('sanpham')->where('ID_SP',$ID_SP)->get();

        $manager_sanpham  = view('admin.edit_sanpham')->with('edit_sanpham',$edit_sanpham)->with('loai_sp',$loaisanpham)->with('thuonghieu_sp',$thuonghieusp);

        return view('admin_layout')->with('admin.edit_sanpham', $manager_sanpham);
    }
    public function update_sanpham(Request $request,$ID_SP){
         $this->AuthLogin();
        $data = array();
        $data['Ten_SP'] = $request->Ten_SP;
        $data['ID_LoaiSP'] = $request->ID_LoaiSP;
        $data['ID_ThuongHieu'] = $request->ID_ThuongHieu;
        $data['SoLuong_SP'] = $request->SoLuong_SP;
        $data['Gia_SP'] = $request->Gia_SP;
        $data['NoiDung_SP'] = $request->NoiDung_SP;
        $data['MoTa_SP'] = $request->MoTa_SP;
        $data['TrangThai_SP'] = $request->TrangThai_SP;
        $get_image = $request->file('HinhAnh_SP');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/sanpham',$new_image);
                    $data['HinhAnh_SP'] = $new_image;
                    DB::table('sanpham')->where('ID_SP',$ID_SP)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-sanpham');
        }
            
        DB::table('sanpham')->where('ID_SP',$ID_SP)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-sanpham');
    }
    public function delete_sanpham($ID_SP){
        $this->AuthLogin();
        DB::table('sanpham')->where('ID_SP',$ID_SP)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-sanpham');
    }
    //End Admin Page
    public function chitiet_sanpham($ID_SP){
        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get(); 
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get(); 

        $chitiet_sanpham = DB::table('sanpham')
        ->join('loaisanpham','loaisanpham.ID_LoaiSP','=','sanpham.ID_LoaiSP')
        ->join('thuonghieusp','thuonghieusp.ID_ThuongHieu','=','sanpham.ID_ThuongHieu')
        ->where('sanpham.ID_SP',$ID_SP)->get();

        foreach($chitiet_sanpham as $key => $value){
            $ID_LoaiSP = $value->ID_LoaiSP;
        }
        

        $related_sanpham = DB::table('sanpham')
        ->join('loaisanpham','loaisanpham.ID_LoaiSP','=','sanpham.ID_LoaiSP')
        ->join('thuonghieusp','thuonghieusp.ID_ThuongHieu','=','sanpham.ID_ThuongHieu')
        ->where('loaisanpham.ID_LoaiSP',$ID_LoaiSP)->whereNotIn('sanpham.ID_SP',[$ID_SP])->get();

        return view('pages.sanpham.show_chitiet')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp)->with('sanpham_chitiet',$chitiet_sanpham)->with('relate',$related_sanpham)
;


    }
}
