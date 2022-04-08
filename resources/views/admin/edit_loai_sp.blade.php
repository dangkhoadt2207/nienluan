@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật loại sản phẩm
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_loai_sp as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-loai-sp/'.$edit_value->ID_LoaiSP)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên loại sản phẩm</label>
                                    <input type="text" value="{{$edit_value->Ten_LoaiSP}}" name="Ten_LoaiSP" class="form-control" id="exampleInputEmail1" >
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả loại sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="MoTa_LoaiSP" id="exampleInputPassword1" >{{$edit_value->MoTa_LoaiSP}}</textarea>
                                </div>
                               
                                <button type="submit" name="update_loai_sp" class="btn btn-info">Cập nhật loại sản phẩm</button>
                                </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection