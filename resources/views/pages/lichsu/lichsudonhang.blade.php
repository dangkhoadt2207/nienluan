@extends('layout')
@section('content')
    <section id="cart_items">
        <!-- <div class="container"> -->
        <div>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}"> Trang chủ </a></li>
                    <li class="active"> Lịch sử đặt hàng của bạn</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <!-- <div class="   table cart_info"> -->
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <th>STT</th>
                            <th>ID Đơn Hàng</th>
                            <th>Họ Tên</th>
                            <th>Tổng Tiền</th>
                            <th>Tình Trạng</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $k => $v)
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $v->ID_DonHang }}</td>
                                <td>{{ $v->HoTen_KhachHang }}</td>
                                <td>{{ $v->Tong_DonHang }}</td>
                                <td>{{ $v->TrangThai_DonHang}}</td>
                                <td>
                                    <a href="{{ URL::to('/lishsu/donhang/chitiet/'.$v->ID_DonHang)}}">Xem lại</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <!-- <div class="container"> -->
        <div>
            <div class="row">

            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
