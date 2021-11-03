@extends('Layout_admin.Main')
@section('content') 
<form class="form-inline">
  <div class="form-group">
    <label for=""></label>
    <input type="text" name="key" class="form-control" placeholder="Seach.....">
    <input type="submit" class="form-control search">
    </div>
</form>
<div class="table-agile-info">
  <div class="panel panel-default">
     <div class="panel-heading">
      Thương hiệu
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
             <th>Thể Loại</th>
             <th data-breakpoints="xs">LOGO</th>
             <th data-breakpoints="xs sm md" data-title="DOB">Ngày tạo</th>
             <th>Tổng sản phẩm</th>
             <th class="text-right">Công cụ</th>
           </tr>
         </thead>
         <tbody>
          @foreach ($data as $item)
              <tr>
                  <td>{{$item['id']}}</td>
                  <td>{{$item['name']}}</td>
                  <td>{{$item->logo?$item->logo:0}}</td>
                  <td>{{$item->created_at?$item->created_at->format('m-d-Y'):'Sẽ cập nhật sớm thui mà...)):'}}</td>
                  <td>{{$item->products?$item->products->count():0}}</td>
                  <td class="text-right">
                    {{-- <form method="POST" action="{{route('category.destroy',$item->id)}}">
                      @csrf @method('DELETE') --}}
                      <a href="{{route('brand.edit',$item->id)}}" class="btn btn-sm btn-success">
                        <i class="fa fa-edit text-edit text"></i>
                      </a>
                      <a href="{{route('brand.destroy',$item->id)}}" class="btn btn-sm btn-danger btndelete">
                        <i class="fa fa-trash text"></i>
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
 <form method="POST" action="" id="form-delete">
   @csrf @method('DELETE')
 </form>
 <hr>
 <div>
   {{$data->appends(request()->all())->links()}}
   {{--appends để giữ nguyên được các tham số khi thay đổi trang --}}
   
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
       })
    </script>
@endsection