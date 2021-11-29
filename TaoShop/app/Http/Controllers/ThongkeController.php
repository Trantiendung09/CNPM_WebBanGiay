<?php

namespace App\Http\Controllers;

use App\Models\Acount;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongkeController extends Controller
{
    public function totalproduct(){
      // tổng tiền theo tháng 
      // tổng sản phẩm  theo tháng 
      // tháng-năm
      $data = DB::table('order')
      ->leftjoin('orderdetail','orderdetail.order_id','=','order.id')
      ->whereYear('order.created_at','=',date('Y'))
      ->selectRaw('SUM(order.total) as total,SUM(orderdetail.quantity) as quantity,Month(order.created_at) as month')
      ->groupByRaw('MONTH(order.created_at)')
      ->get();
      return view('Layout_admin.chart.chartjs',[
          'titel'=>'thống kê'
      ],compact('data'));
    }
    public function thongkeloc(Request $request){
      $todate=$request->input('todate');
      $fromdate=$request->input('fromdate');
      
      $data = DB::table('order')
      ->leftjoin('orderdetail','orderdetail.order_id','=','order.id')
      ->whereBetween('order.created_at',[$fromdate,$todate])
      ->selectRaw('SUM(order.total) as total,SUM(orderdetail.quantity) as quantity')
      ->get();
      return response()->json(['data'=>$data]);
    }
    public function graph(){
      return view('Layout_admin.chart.chartjs',[
        'titel'=>'Đồ thị tăng trưởng'
      ]);
    }
}
