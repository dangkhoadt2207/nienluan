@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			<div class="register-req">
				<p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form action="{{URL::to('/save-checkout-khachhang')}}" method="POST">
									{{csrf_field()}}
									<input type="text" name="Ten_VanChuyen" placeholder="Họ và tên" value="{{$khachhang->HoTen_KhachHang}}">
									<input type="text" name="Email_VanChuyen" placeholder="Email" value="{{$khachhang->Email_KhachHang}}">
									<input type="text" name="SDT_VanChuyen" placeholder="Số điện thoại" value="{{$khachhang->SDT_KhachHang}}">
									<input type="text" name="DiaChi_VanChuyen" placeholder="Địa chỉ giao hàng" value="{{$khachhang->DiaChi_KhachHang}}" >
									<textarea name="GhiChu_VanChuyen"  placeholder="Ghi chú đơn hàng của bạn" rows="16" value=""></textarea>
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
								</form>
							</div>
							
						</div>
					</div>
									
				</div>
			</div>
			<div class="review-payment" style="margin:5px 0;font-size: 20px;">
				<h2 >Xem lại giỏ hàng</h2>
			</div>

			
			<div class="payment-options" style="margin:30px 0;font-size: 20px;">
					<span>
						<label><input type="checkbox"> Thanh toán bằng thẻ ATM</label>
					</span>
					<span>
						<label><input type="checkbox"> Thanh toán bằng tiền mặt khi nhận hàng</label>
					</span>
					<span>
						<label><input type="checkbox"> Thanh toán bằng thẻ ghi nợ</label>
					</span>
			</div>
		</div>
	</section> <!--/#cart_items-->

@endsection