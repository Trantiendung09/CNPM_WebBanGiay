<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('Layout_admin.LoginAdmin');
    }
    public function home(){
        return view('Layout_admin.home_admin');
    }
    public function homeadmin(Request $request){
        $name=$request->Email;
        $password=md5($request->Password);
        $result=DB::table('tbl_acount')->where('Acount_name',$name)->where('PassWord',$password)->first();
        // print_r($result);
        // echo '<pre>';
        // print_r($result);
        // echo  '</pre>';
        if($result!=null){
            $request->session()->put('Acount_name', $result->Acount_name);
            $request->session()->put('Acount_id', $result->Acount_id);
            return view('Layout_admin.home_admin');
      }
      else{
          $request->session()->put('message','mat khau hoac tai khoan khong chinh xac');
          return Redirect::to('/login_admin');
      }

    }
    public function logout(){
        session()->put('Acount_name',null);
        session()->put('Acount_id',null);
        return Redirect::to('/login_admin');
    }
}
