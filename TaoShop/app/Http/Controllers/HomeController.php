<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sp = Product::where('price', '>', '1000000')
            ->where('quantity', '>', '30')
            ->get();
        $category = Category::all();
        return view('layout.home', compact('sp', 'category'));
    }
    public function detail(Request $id)
    {
        $sps = Product::where('id', $id->id)->first();
        $category = Category::all();
        return view('layout.product_detail', compact('sps', 'category'));
    }
    public function search( $name)
    {
        //$sp = DB::table('product')->where('name', 'LIKE', '%' . $name . '%')->get();
        $sp=Product::where('name','like','%'. $name .'%')->get();
        return view('layout.search', compact('sp'));
    }
    public function menu_vip($loai, $hang)
    {
        $brand=Brand::where('name',$hang)->first();
        $sp=Product::where('category_id', $loai)
        ->where('brand_id', $brand->id)->get();
        $category = Category::all();
        return view('layout.home', compact('sp', 'category'));
    }
    public function category_menu($id)
    {
        $sp=Product::where('category_id', $id)->get();
        return view('layout.menu_vip', compact('sp'));
    }
}
