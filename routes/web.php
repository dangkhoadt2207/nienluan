<?php
use illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');


//Danh muc san pham trang chu
Route::get('/danh-muc-san-pham/{ID_LoaiSP}','LoaiSanPhamController@show_loaisp_home');
Route::get('/thuong-hieu-san-pham/{ID_ThuongHieu}','ThuongHieuSanPhamController@show_thuonghieu_home');
Route::get('/chi-tiet-san-pham/{ID_SP}','SanPhamController@chitiet_sanpham');

//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

//Loại Sản Phẩm
Route::get('/add-loai-sp','LoaiSanPhamController@add_loai_sp');
Route::get('/edit-loai-sp/{ID_LoaiSP}','LoaiSanPhamController@edit_loai_sp');
Route::get('/delete-loai-sp/{ID_LoaiSP}','LoaiSanPhamController@delete_loai_sp');
Route::get('/all-loai-sp','LoaiSanPhamController@all_loai_sp');

Route::get('/active-loai-sp/{ID_LoaiSP}','LoaiSanPhamController@active_loai_sp');
Route::get('/unactive-loai-sp/{ID_LoaiSP}','LoaiSanPhamController@unactive_loai_sp');


Route::post('/save-loai-sp','LoaiSanPhamController@save_loai_sp');
Route::post('/update-loai-sp/{ID_LoaiSP}','LoaiSanPhamController@update_loai_sp');

//Thương Hiệu Sản Phẩm
Route::get('/add-thuong-hieu','ThuongHieuSanPhamController@add_thuong_hieu');
Route::get('/edit-thuong-hieu/{ID_ThuongHieu}','ThuongHieuSanPhamController@edit_thuong_hieu');
Route::get('/delete-thuong-hieu/{ID_ThuongHieu}','ThuongHieuSanPhamController@delete_thuong_hieu');
Route::get('/all-thuong-hieu','ThuongHieuSanPhamController@all_thuong_hieu');

Route::get('/unactive-thuong-hieu/{ID_ThuongHieu}','ThuongHieuSanPhamController@unactive_thuong_hieu');
Route::get('/active-thuong-hieu/{ID_ThuongHieu}','ThuongHieuSanPhamController@active_thuong_hieu');

Route::post('/save-thuong-hieu','ThuongHieuSanPhamController@save_thuong_hieu');
Route::post('/update-thuong-hieu/{ID_ThuongHieu}','ThuongHieuSanPhamController@update_thuong_hieu');

//Sản phẩm
Route::get('/add-sanpham','SanPhamController@add_sanpham');
Route::get('/edit-sanpham/{ID_SP}','SanPhamController@edit_sanpham');
Route::get('/delete-sanpham/{ID_SP}','SanPhamController@delete_sanpham');
Route::get('/all-sanpham','SanPhamController@all_sanpham');

Route::get('/unactive-sanpham/{ID_SP}','SanPhamController@unactive_sanpham');
Route::get('/active-sanpham/{ID_SP}','SanPhamController@active_sanpham');

Route::post('/save-sanpham','SanPhamController@save_sanpham');
Route::post('/update-sanpham/{ID_SP}','SanPhamController@update_sanpham');


//Giỏ Hàng
Route::post('/update-giohang-soluong','GioHangController@update_giohang_soluong');
Route::post('/save-giohang','GioHangController@save_giohang');
Route::get('/show-giohang','GioHangController@show_giohang');
Route::get('/show-giohang/{ID_SP}','GioHangController@show_giohang1');
Route::get('/delete-to-giohang/{rowId}','GioHangController@delete_to_giohang');


//Checkout
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-khachhang','CheckoutController@add_khachhang');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-khachhang','CheckoutController@login_khachhang');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-khachhang','CheckoutController@save_checkout_khachhang');

//Order
Route::get('/qly-donhang','CheckoutController@qly_donhang');
Route::get('/view-dh/{orderId}','CheckoutController@view_dh');
Route::get('/duyet-dh/update/{ID_DonHang}','CheckoutController@duyet_dh');
Route::get('/delete-dh/{ID_DonHang}','CheckoutController@delete_dh');



//History
Route::get('/lichsu/{id}','LichSuController@lichsu');
Route::get('/lishsu/donhang/chitiet/{id}', 'LichSuController@chitietDH');
