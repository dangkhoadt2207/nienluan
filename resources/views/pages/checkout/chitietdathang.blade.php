@extends('layout')
@section('content')
    <section id="cart_items">
        <!-- <div class="container"> -->
        <div>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}"> Trang chủ </a></li>
                    <li class="active"> Chi tiet don hang da dat</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <!-- <div class="table cart_info"> -->
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <th>Tên Sản Phẩm</th>
                            <th>Giá Sản Phẩm</th>
                            <th>Số Lượng Đã Mua</th>
                            <th>Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $list as $k => $v )
                        <tr>
                            <td>{{$v->Ten_SP }}</td>
                            <td>{{$v->Gia_SP }}</td>
                            <td>{{$v->SoLuong_DaMua_SP }}</td>
                            <td>{{$v->TongTien_ChiTiet}}</td>
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
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng <span>{{ Cart::total(0, ',', '.') . ' ' . 'VNĐ' }}</span></li>
                            <li>Thuế <span>{{ Cart::tax(0, ',', '.') . ' ' . 'VNĐ' }}</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>{{ Cart::total(0, ',', '.') . ' ' . 'VNĐ' }}</span></li>
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <?php
                                   $ID_KhachHang = Session::get('ID_KhachHang');
                                   if($ID_KhachHang!=NULL){
                                 ?>

                        <a class="btn btn-default check_out" href="{{ URL::to('/checkout') }}">Thanh toán</a>
                        <?php
                            }else{
                                 ?>

                        <a class="btn btn-default check_out" href="{{ URL::to('/login-checkout') }}">Thanh toán</a>
                        <?php
                             }
                                 ?>



                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
