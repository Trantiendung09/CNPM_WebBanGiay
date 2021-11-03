<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $sp=Product::
        where('price','>','0')
        ->where('quantity','>','30')
        ->get();
        return view('layout.home',compact('sp'));
    }
    public function detail(Request $id)
    {
        $sps=Product::
        where('id',$id->id)->first();
        return view('layout.product_detail',compact('sps'));
    }

}
