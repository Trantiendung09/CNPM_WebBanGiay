@extends('Layout_admin.Main')
@section('content') 
<div class="table-agile-info">
    <div class="panel panel-default">
       <div class="panel-heading">
        List all order
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
               <th>Status</th>
               <th>Total(vnđ)</th>
               <th>Date</th>
             </tr>
           </thead>
           <tbody>
               @foreach ($model as $item)
               <tr>
                   <td>{{$item->id}}</td>
                   <td>{{$item->customername->name}}</td>
                   <td>{{$item->customername->phone}}</td>
                   <td>{{$item->customername->adress}}</td>
                   <td>
                       @if($item->status==0) <span>chưa giao</span> @endif
                       @if($item->status==1) <span>đang giao</span> @endif
                       @if($item->status==2) <span>hoàn thành</span> @endif
                   </td>
                   <td>{{$item->total}}</td>
                   <td>{{$item->created_at?$item->created_at->format('m-d-Y'):'Sẽ cập nhật sớm thui mà...)):'}}</td>
                </tr>
               @endforeach           
           </tbody>
         </table>
       </div>
     </div>
   </div>
@endsection