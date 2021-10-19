@extends('Layout_admin.Main')
@section('content') 
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
@endsection