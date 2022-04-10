@extends('layout')
@section('content')
    <section id="cart_items">
        <!-- <div class="container"> -->
        <div>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                   
                    <li><a href="{{ URL::to('/') }}">  Trang chủ  </a></li>
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

   
    <!--/#do_action-->
@endsection
