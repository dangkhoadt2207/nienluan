@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                @foreach($edit_sanpham as $key => $sanpham)
                                <form role="form" action="{{URL::to('/update-sanpham/'.$sanpham->ID_SP)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="Ten_SP" class="form-control" id="exampleInputEmail1" value="{{$sanpham->Ten_SP}}">
                                </div>
                                

                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                                      <select name="ID_LoaiSP" class="form-control input-sm m-bot15">
                                        @foreach($loai_sp as $key => $loaisanpham)
                                            @if($loaisanpham->ID_LoaiSP==$sanpham->ID_LoaiSP)
                                                <option selected value="{{$loaisanpham->ID_LoaiSP}}">{{$loaisanpham->Ten_LoaiSP}}</option>
                                            @else
                                                <option value="{{$loaisanpham->ID_LoaiSP}}">{{$loaisanpham->Ten_LoaiSP}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                      <select name="ID_ThuongHieu" class="form-control input-sm m-bot15">
                                        @foreach($thuonghieu_sp as $key => $thuonghieusp)
                                        @if($thuonghieusp->ID_ThuongHieu==$sanpham->ID_ThuongHieu)
                                            <option selected value="{{$thuonghieusp->ID_ThuongHieu}}">{{$thuonghieusp->Ten_ThuongHieu}}</option>
                                        @else
                                            <option value="{{$thuonghieusp->ID_ThuongHieu}}">{{$thuonghieusp->Ten_ThuongHieu}}</option> 
                                        @endif
                                        @endforeach   
                                    </select>
                                </div>    

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="HinhAnh_SP" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/sanpham/'.$sanpham->HinhAnh_SP)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" name="SoLuong_SP" class="form-control" id="exampleInputEmail1" value="{{$sanpham->SoLuong_SP}}">
                                </div>
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" value="{{$sanpham->Gia_SP}}" name="Gia_SP" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="NoiDung_SP" id="exampleInputPassword1" >{{$sanpham->NoiDung_SP}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="MoTa_SP" id="exampleInputPassword1">{{$sanpham->MoTa_SP}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="TrangThai_SP" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                             <option value="1">Ẩn</option>
                                    </select>
                                </div>
                               
                                <button type="submit" name="edit_sanpham" class="btn btn-info">Cập nhật sản phẩm</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection