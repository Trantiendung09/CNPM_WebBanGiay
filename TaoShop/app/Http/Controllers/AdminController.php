<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public  function dashboard(){
      return view('Layout_admin.home_admin',[
         'titel'=>"Trang quản trị viên"
      ]);
   }
   public function file(){
      return view('Layout_admin.filemanager',[
         'titel'=>'trang quản lý file'
      ]);
   }
}
