@extends('Layout_admin.Main')
@section('content') 
<div class="table-agile-info">
    <div class="panel panel-default">
       <div class="panel-heading">
        Danh sách đơn hàng chưa giao
       </div>
       <div>
         <table class="table" ui-jq="footable" ui-options='{
           "paging": {
             "enabled": true
           },
           "filtering": {
             "enabled": true
           },
           "sorting": {
             "enabled": true
           }}'>
           <thead>
             <tr>
               <th data-breakpoints="xs">ID</th>
               <th>Name</th>
               <th>Phome number</th>
               <th>Adress</th>
               <th>Total(vnđ)</th>
               <th>Date</th>
               <th class="text-center">Cập nhật</th>
             </tr>
           </thead>
           <tbody>
               @foreach ($model as $item)
               <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->customername->name}}</td>
                   <td>{{$item->customername->phone}}</td>
                   <td>{{$item->customername->adress}}</td>
                   <td>{{$item->total}}</td>
                   <td>{{$item->created_at?$item->created_at->format('m-d-Y'):'Sẽ cập nhật sớm thui mà...)):'}}</td>
                   <td class="text-center">
                    {{-- <form method="POST" action="{{route('category.destroy',$item->id)}}">
                      @csrf @method('DELETE') --}}
                      <a href="{{route('order.show',$item->id)}}" class="btn btn-sm btn-primary btnedit" id="btnedit">
                        <i class="fa fa-edit text-edit text">chấp nhận</i>
                      </a>
                      <a href="{{route('order.destroy',$item->id)}}" class="btn btn-sm btn-danger btndelete" id="btndelete">
                        <i class="fa fa-trash text">Hủy đơn</i>
                      </a>
                    {{-- </form> --}}
                  </td>
                </tr>
               @endforeach           
           </tbody>
         </table>
       </div>
     </div>
   </div>
   
   <div class="modal" tabindex="-1" role="dialog" id="modelProduct">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="panel panel-primary">
              <div class="panel-heading" id="modeltitel">Thông tin đơn hàng</div>
              <div>
                  <label for="">Tên khách hàng: </label>
                  <span id="name"></span>
              </div>
              <div>
                <label for="">Địa chỉ: </label>
                <span id="adress"></span>
            </div>
            <div>
                <label for="">Số điện thoại: </label>
                <span id="phone"></span>
              </div>
            <div>
                <label for="">Ngày đặt: </label>
                <span id="create_date"></span>
            </div>
            <div>
                <label for="">Sipper Date: </label>
                <span id="shipper_date"></span>
            </div>
            <div>
                <label for="">Ghi chú: </label>
                <span id="note"></span>
            </div>
            <div>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Size</th>
                        <th scope="col">Màu</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Giảm(%)</th>
                        <th scope="col">Note</th>
                        <th scope="col">Tổng</th>
                      </tr>
                    </thead>
                    <tbody id="tbody">
                    
                    </tbody>
                  </table>
            </div>
            </div>
            <div style="float: right">
                <label for="">Thanh toán:</label>
                <span>Total </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnsave">Accept</button>
                <button type="button" class="btn btn-primary" id="btneditsave" style="">Accept&Emport</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnclose">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.btndelete').click(function(even){
      even.preventDefault(); // event.preventDefault() là ngăn không cho kết nối tới URL
      var _href=$(this).attr('href');
      $('form#form-delete').attr('action',_href);  // loaithe#id 
      if(confirm('Bạn có muốn xóa mục đã chọn không?')){
        $('form#form-delete').submit();
      }
     });
     $('#btnedit').click(function(even){
         even.preventDefault();
         var url=$(this).attr('href');
         $.ajax({
                url:url,
                type: 'GET',
                success: function (response) {
                   console.log(response);
                   $('#tbody').html(response);
                },
                error: function () {
                    alert("Chinh sua that bai");
                }
            });
       $('#modelProduct').modal();
     });   
  </script>
@endsection
