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
       Danh sách sản phẩm    
    </div>
     <div>
       <table class="table table-hower">
         <thead>
           <tr>
             <th>ID</th>
             <th>Tên sản phẩm</th>
             {{-- <th>Ảnh hiện thị</th> --}}
             <th>Thương hiệu</th>
             <th>Loại sản phẩm</th>
             <th>Size</th>
             <th>Màu</th>
             <th>Số lượng</th>
             {{-- <th>Giảm</th> --}}
             <th>Đơn giá/Giảm(%)</th>
             {{-- <th>Ngày tạo</th> --}}
             <th>Mô tả</th>
             <th class="text-right">Công cụ</th>
           </tr>
         </thead>
         <tbody>
             @foreach ($data as $item)
             <tr>
              <td>{{$item->id}}</td>
                 <td>{{$item->name}}</td>
                 {{-- <td>{{$item->photoname->photo_n1}}</td> --}}
                 <td>{{$item->categoryname->name}}</td>
                 <td>{{$item->brandname->name}}</td>
                 <td>{{$item->size}}</td>
                 <td>{{$item->color}}</td>
                 <td>{{$item->quantity}}</td>
                 {{-- <td>{{$item->discount}}/</td> --}}
                 <td>{{$item->price}}/<span class="badge badge-success">{{$item->discount}}%</span></td>
                 {{-- <td>{{$item->created_at?$item->created_at->format('m-d-Y'):'Sẽ cập nhật sớm thui mà...)):'}}</td> --}}
                 <td>{{$item->note}}</td>
                 <td class="text-right">
                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-sm btn-success">
                      <i class="fa fa-edit text"></i>
                    </a>
                    <a href="{{route('product.destroy',$item->id)}}" class="btn btn-sm btn-danger btndelete">
                      <i class="fa fa-trash text"></i>
                    </a>
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