@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        @foreach($all_sanpham as $key => $sanpham)
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                             <a href="{{URL::to('/chi-tiet-san-pham/'.$sanpham->ID_SP)}}">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to('public/uploads/sanpham/'.$sanpham->HinhAnh_SP)}}" alt="" />
                                            <h2>{{number_format($sanpham->Gia_SP).' '.'VNĐ'}}</h2>
                                            <p>{{$sanpham->Ten_SP}}</p>
                                            <a href="{{URL::to('/show-giohang/'.$sanpham->ID_SP)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                        </div>

                                </div>
                            </a>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->
        <!--/recommended_items-->
@endsection
