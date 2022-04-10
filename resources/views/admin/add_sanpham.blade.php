@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm sản phẩm
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
                                <form role="form" action="{{URL::to('/save-sanpham')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min3" data-validation-error-msg="Chưa điền Tên cho sản phẩm của bạn? Xin hãy điền vào ít nhất 3 kí tự!" name="Ten_SP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Loại sản phẩm</label>
                                      <select name="ID_LoaiSP" class="form-control input-sm m-bot15">
                                        @foreach($loai_sp as $key => $loaisanpham)
                                            <option value="{{$loaisanpham->ID_LoaiSP}}">{{$loaisanpham->Ten_LoaiSP}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                      <select name="ID_ThuongHieu" class="form-control input-sm m-bot15">
                                        @foreach($thuonghieu_sp as $key => $thuonghieusp)
                                            <option value="{{$thuonghieusp->ID_ThuongHieu}}">{{$thuonghieusp->Ten_ThuongHieu}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="HinhAnh_SP" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Chưa điền giá tiền cho sản phẩm của bạn? Xin hãy điền vào ít nhất 5 chữ số!" name="Gia_SP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Chưa điền số lượng cho sản phẩm của bạn? Xin hãy điền vào ít nhất 1 chữ số!" name="SoLuong_SP" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="NoiDung_SP" id="ckeditor3" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="MoTa_SP" id="ckeditor4" placeholder="Nội dung sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="TrangThai_SP" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_sanpham" class="btn btn-info">Thêm sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection
