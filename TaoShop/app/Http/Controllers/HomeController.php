<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $category=Category::all();
        return view('layout.home',compact('sp','category'));
    }
    public function detail(Request $id)
    {
        $sps=Product::
        where('id',$id->id)->first();
        $category=Category::all();
        return view('layout.product_detail',compact('sps','category'));
    }

}
