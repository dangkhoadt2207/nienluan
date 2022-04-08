@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     XỬ LÝ ĐƠN HÀNG
    </div>
    
    
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo "<span class='text-alert'>".$message."</span>";
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>ID Đơn Hàng</th>
            <th>Trạng thái </th>
            <th>Duyệt đơn hàng</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td>{{$info_donhang->ID_DonHang}}</td>
            <td>{{$info_donhang->TrangThai_DonHang}}</td>
            @if($info_donhang->TrangThai_DonHang == 'Đang chờ xử lý')
              <td>
                <form action="{{URL::to('/duyet-dh/update/'.$info_donhang->ID_DonHang)}}" method="GET">
                  <select name="trangthaiduyet" >
                    <option value = "Đã hoàn thành">Đã hoàn thành</option>
                    <option value = "Hủy đơn hàng">Hủy đơn hàng</option>
                  </select>
                  <button type="submit">Duyệt</button>
                </form>
              </td>
            @else
              <td>Đã xử lý</td>
            @endif
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>




<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin khách hàng
    </div>
    
    
    <div class="table-responsive">
                      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Email khách hàng</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td>{{$info_donhang->HoTen_KhachHang}}</td>
            <td>{{$info_donhang->SDT_KhachHang}}</td>
            <td>{{$info_donhang->Email_KhachHang}}</td>
           
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
     Thông tin vận chuyển
    </div>
    
    
    <div class="table-responsive">
                   
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th>Tên người nhận hàng</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
          
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        
          <tr>
           
            <td>{{$info_donhang->Ten_VanChuyen}}</td>
            <td>{{$info_donhang->DiaChi_VanChuyen}}</td>
             <td>{{$info_donhang->SDT_VanChuyen}}</td>
            
           
          
          </tr>
     
        </tbody>
      </table>

    </div>
   
  </div>
</div>
<br><br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="row w3-res-tb">
      <!-- <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div> -->
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        
      </div>
    </div>
    
    <div class="table-responsive">
                      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tổng tiền</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($donhang_by_id as $key => $v)
          <tr>
            <td>{{ $v->Ten_SP}}</td>
            <td>{{ $v->SoLuong_DaMua_SP}}</td>
            <td>{{ $v->Gia_SP}}</td>
            
            <td>{{ $v->Gia_SP * $v->SoLuong_DaMua_SP }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection