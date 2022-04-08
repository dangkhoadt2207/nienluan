@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm danh mục sản phẩm
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
                                <form role="form" action="{{URL::to('/save-loai-sp')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                                    <input type="text" name="Ten_LoaiSP" class="form-control" id="exampleInputEmail1" placeholder="Tên loại sản phẩm">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả loại sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="MoTa_LoaiSP" id="exampleInputPassword1" placeholder="Mô tả loai sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="TrangThai_LoaiSP" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_loai_sp" class="btn btn-info">Thêm loại sản phẩm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection