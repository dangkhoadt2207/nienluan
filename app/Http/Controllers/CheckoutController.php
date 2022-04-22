<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function AuthLogin(){
        $ID_Admin = Session::get('ID_Admin');
        if($ID_Admin){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function view_dh($orderId){
        $this->AuthLogin();
        $donhang_by_id = DB::table('chitietdonhang')
        ->select('chitietdonhang.*')->where('chitietdonhang.ID_DonHang',$orderId)->get();

        $info_donhang = DB::table('donhang')
        ->join('khachhang','donhang.ID_KhachHang','=','khachhang.ID_KhachHang')
        ->join('vanchuyen','donhang.ID_VanChuyen','=','vanchuyen.ID_VanChuyen')
        ->select('donhang.*','khachhang.*','vanchuyen.*')->where('donhang.ID_DonHang',$orderId)->first();


        $manager_donhang_by_id  = view('admin.view_dh')->with('donhang_by_id',$donhang_by_id)->with('info_donhang',$info_donhang);
        return view('admin_layout')->with('admin.view_dh', $manager_donhang_by_id);

    }
    public function duyet_dh(Request $request, $ID_DonHang){

        $trangthaiduyet = $request->trangthaiduyet;

        $update = DB::table('donhang')
        ->where('ID_DonHang',$ID_DonHang)
        ->update(['TrangThai_DonHang' => $trangthaiduyet]);

        if($trangthaiduyet == "Đã hoàn thành"):
            $donhang_by_id = DB::table('chitietdonhang')->select('chitietdonhang.*')->where('ID_DonHang',$ID_DonHang)->get();

            foreach ($donhang_by_id as $key => $value) {
                $ID_SP = $value->ID_SP;

                $sl_kho = DB::table('sanpham')->where('ID_SP', $ID_SP)->first();
                $slmua = $value->SoLuong_DaMua_SP;

                $sl_conlai = $sl_kho->SoLuong_SP - $slmua;

                $update_sl = DB::table('sanpham')
                ->where('ID_SP',$ID_SP)
                ->update(['SoLuong_SP' => $sl_conlai]);
            }

        elseif($trangthaiduyet == "Huỷ đơn hàng"):
            $donhang_by_id = DB::table('chitietdonhang')->select('chitietdonhang.*')->where('ID_DonHang',$ID_DonHang)->get();

            foreach ($donhang_by_id as $key => $value) {
                $ID_SP = $value->ID_SP;

                $sl_kho = DB::table('sanpham')->where('ID_SP', $ID_SP)->first();
                $slmua = $value->SoLuong_DaMua_SP;

                $sl_conlai = $sl_kho->SoLuong_SP + $slmua;

                $update_sl = DB::table('sanpham')
                ->where('ID_SP',$ID_SP)
                ->update(['SoLuong_SP' => $sl_conlai]);
            }
        endif;

        return redirect()->back();
    }

    public function delete_dh($ID_DonHang){
        DB::table('donhang')->where('ID_DonHang',$ID_DonHang)->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();
    }




    public function login_checkout(){

    	$loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get();
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get();

    	return view('pages.checkout.login_checkout')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp);
    }
    public function add_khachhang(Request $request){

        $data = array();
        $data['Email_KhachHang'] = $request->Email_KhachHang;
        $data['MatKhau_KhachHang'] = md5($request->MatKhau_KhachHang);
        $data['HoTen_KhachHang'] = $request->HoTen_KhachHang;
        $data['DiaChi_KhachHang'] = $request->DiaChi_KhachHang;
        $data['SDT_KhachHang'] = $request->SDT_KhachHang;

        $ID_KhachHang = DB::table('khachhang')->insertGetId($data);

        Session::put('ID_KhachHang',$ID_KhachHang);
        Session::put('Email_KhachHang',$request->Email_KhachHang);

        return Redirect::to('/checkout');


    }


    public function checkout(){
    	$loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get();
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get();
        $id= Session::get('ID_KhachHang');

        $khachhang = DB::table('khachhang')->where('ID_KhachHang',$id)->first();
    	return view('pages.checkout.show_checkout')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp)->with('khachhang',$khachhang);
    }
    public function save_checkout_khachhang(Request $request){
    	$data = array();
        $data['Ten_VanChuyen'] = $request->Ten_VanChuyen;
        $data['SDT_VanChuyen'] = $request->SDT_VanChuyen;
        $data['DiaChi_VanChuyen'] = $request->DiaChi_VanChuyen;
    	$data['Email_VanChuyen'] = $request->Email_VanChuyen;
        $data['GhiChu_VanChuyen'] = $request->GhiChu_VanChuyen;

    	$ID_VanChuyen = DB::table('vanchuyen')->insertGetId($data);

    	Session::put('ID_VanChuyen',$ID_VanChuyen);

    	return Redirect::to('/payment');
    }
    public function payment(){

        $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get();
        $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get();
        return view('pages.checkout.payment')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp);

    }
    public function order_place(Request $request){
        //insert hinh thuc thanh toan
        // $content = Cart::content();
        // echo $content;
        $data = array();
        $data['PhuongPhap_ThanhToan'] = $request->payment_option;
        $data['TrangThai_ThanhToan'] = 'Đang chờ xử lý';
        $ID_ThanhToan = DB::table('thanhtoan')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['ID_KhachHang'] = Session::get('ID_KhachHang');
        $order_data['ID_VanChuyen'] = Session::get('ID_VanChuyen');
        $order_data['ID_ThanhToan'] = $ID_ThanhToan;
        $order_data['Tong_DonHang'] = Cart::total();
        $order_data['TrangThai_DonHang'] = 'Đang chờ xử lý';
        $ID_DonHang = DB::table('donhang')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $chi_tiet_data['ID_DonHang'] = $ID_DonHang;
            $chi_tiet_data['ID_SP'] = $v_content->id;
            $chi_tiet_data['Ten_SP'] = $v_content->name;
            $chi_tiet_data['Gia_SP'] = $v_content->price;
            $chi_tiet_data['SoLuong_DaMua_SP'] = $v_content->qty;
            $chi_tiet_data['TongTien_ChiTiet'] = $v_content->total;
            DB::table('chitietdonhang')->insert($chi_tiet_data);
        }
        if($data['PhuongPhap_ThanhToan']==1){

            echo 'Thanh toán thẻ ATM';

            $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get();
            $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get();
             return view('pages.checkout.handcash')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp);

        }elseif($data['PhuongPhap_ThanhToan']==2){
            Cart::destroy();

            $loai_sp = DB::table('loaisanpham')->where('TrangThai_LoaiSP','0')->orderby('ID_LoaiSP','desc')->get();
            $thuonghieu_sp = DB::table('thuonghieusp')->where('TrangThai_ThuongHieu','0')->orderby('ID_ThuongHieu','desc')->get();
            return view('pages.checkout.handcash')->with('loaisanpham',$loai_sp)->with('thuonghieusp',$thuonghieu_sp);

        }else{
            echo 'Thẻ ghi nợ';

        }

        //return Redirect::to('/payment');
    }


    public function logout_checkout(){
    	Session::flush();
    	return Redirect::to('/login-checkout');
    }
    public function login_khachhang(Request $request){
    	$Email_KhachHang= $request->Email_KhachHang;
    	$MatKhau_KhachHang = md5($request->MatKhau_KhachHang);
    	$result = DB::table('khachhang')->where('Email_KhachHang',$Email_KhachHang)->where('MatKhau_KhachHang',$MatKhau_KhachHang)->first();

    	if($result){
    		Session::put('ID_KhachHang',$result->ID_KhachHang);
            Session::put('HoTen_KhachHang',$result->HoTen_KhachHang);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}
    }


    public function qly_donhang(){
        $this->AuthLogin();
        $all_donhang = DB::table('donhang')
        ->join('khachhang','donhang.ID_KhachHang','=','khachhang.ID_KhachHang')
        ->select('donhang.*','khachhang.HoTen_KhachHang')
        ->orderby('donhang.ID_DonHang','desc')->get();
        $manager_donhang = view('admin.qly_donhang')->with('all_donhang',$all_donhang);
        return view('admin_layout')->with('admin.qly_donhang',$manager_donhang);
    }
}
