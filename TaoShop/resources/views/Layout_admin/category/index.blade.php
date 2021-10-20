@extends('Layout_admin.Main')
@section('content') 
<div class="alert alert-danger" role="alert">
  <strong>primary</strong>
</div>
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{Session::get('error')}}
</div>
@endif
@if(Session::has('succes'))
<div class="alert alert-success" role="alert">
  {{Session::get('succes')}}
</div>
@endif
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
      Loại Sản Phẩm
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
                  <td>{{$item['logo']}}</td>
                  <td>{{$item->created_at->format('m-d-Y')}}</td>
                  <td>{{$item->products?$item->products->count():0}}</td>
                  <td class="text-right">
                      <a href="" class="btn btn-sm btn-success">
                      <i class="fas fa-edit"></i>
                      </a>
                      <a href="" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                        </a>

                  </td>
              </tr>
          @endforeach
         </tbody>
       </table>
     </div>
   </div>
 </div>
 <hr>
 <div>
   {{$data->appends(request()->all())->links()}}
   {{--appends để giữ nguyên được các tham số khi thay đổi trang --}}
   
 </div>
@endsection