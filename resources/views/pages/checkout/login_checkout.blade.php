@extends('layout')
@section('content')

	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL::to('/login-khachhang')}}" method="POST">
							{{csrf_field()}}
							<input type="text" name="Email_KhachHang" placeholder="Tài khoản" />
							<input type="password" name="MatKhau_KhachHang" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Ghi nhớ đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<form action="{{URL::to('/add-khachhang')}}" method="POST">
							{{ csrf_field() }}
							
							<input type="email" name="Email_KhachHang" placeholder="Email"/>
							<input type="password" name="MatKhau_KhachHang" placeholder="Mật khẩu"/>
							<input type="text" name="HoTen_KhachHang" placeholder="Họ và tên"/>
							<input type="text" name="DiaChi_KhachHang" placeholder="Địa chỉ"/>
							<input type="text" name="SDT_KhachHang" placeholder="Phone"/>
							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection