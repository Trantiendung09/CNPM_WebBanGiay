<?php

namespace App\Http\Controllers;

use App\Models\Acount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   
   public  function check()
   {
      if(session('acount_name')==null)
      {
          return  redirect()->route('login');
      }
     
  }
   public  function dashboard(){
      $products=Acount::select(DB::raw("COUNT(*) as count"))
      ->whereYear('created_at',date('Y'))
      ->groupBy(DB::raw("Month(created_at)"))
      ->pluck('count'); // lấy ra số sản phẩm trong 1 tháng 
      $months=Acount::select(DB::raw("Month(created_at) as month"))
      ->whereYear('created_at',date('Y'))
      ->groupBy(DB::raw("Month(created_at)"))
      ->pluck("month"); // lấy ra tháng có 
      $data=[0,0,0,0,0,0,0,0,0,0,0,0];
      foreach($months as $index => $month){
         $data[$month-1]=$products[$index];
      }
      // dd($data);

      return view('Layout_admin.home_admin',[
         'titel'=>"Trang quản trị viên"
      ],compact('data'));
   }
   public function file(){
      return view('Layout_admin.filemanager',[
         'titel'=>'trang quản lý file'
      ]);
   }
}
