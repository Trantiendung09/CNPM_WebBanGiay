<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller 
{
    public  function Authorizetion(){
        if(session('acount_name')===null)
        {
            return  redirect()->route('login');
        }
    }
    public function login(){
        return view('layout.login');
    }
    public function store(Request $request){
        $email=$request->email;
        $password=$request->pass;
        $acount=User::where('email',$email)->select('Acount_name','email')->get();
        if($acount->count()>0)
        {
        if(Auth::attempt(['email' => $email,'password' => $password,'Role'=>1]))
        {
            $acount_name=$acount[0]->Acount_name;
            session()->put('acount_name',$acount_name);
            return redirect()->route('admin.dashboard')->with('acount_name',' '.$acount_name);
            // return view('Layout_admin.home_admin',[
            //     'titel'=>'Chào mừng đến với trang quản trị'],compact('acount_name'));
        }
        if(Auth::attempt(['email' => $email,'password' => $password,'Role'=>0]))
        {
            $acount_name=$acount[0]->Acount_name;
            session()->put('acount_name',$acount_name);
            return redirect()->route('home.index')->with('acount_name',' '.$acount_name);
            // return view('Layout_admin.home_admin',[
            //     'titel'=>'Chào mừng đến với trang quản trị'],compact('acount_name'));
        }
        else{
            return back()->with('error','Mật khẩu không chính xác!');
        }
    }else
    return back()->with('error','Email không tồn tại!');
    }
    public function logout(){
        session()->forget('acount_name');
        dd(session('acount_name'));
        return redirect()->route('login');
    }
}
