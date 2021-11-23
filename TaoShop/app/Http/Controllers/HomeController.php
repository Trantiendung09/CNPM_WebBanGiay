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
        $sp = Product::paginate(8);
            // $sp = Product::where('price', '>', '1000000')
            // ->where('quantity', '>', '30')
            // ->paginate(5);
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
        ->where('brand_id', $brand->id)->paginate(4);
        $category = Category::all();
        $loai=Category::where('id',$loai)->first();
        return view('layout.category', compact('sp', 'category','loai', 'hang'));
    }
    public function category_menu($id)
    {
        $sp=Product::where('category_id', $id)->paginate(8);
        return view('layout.menu_vip', compact('sp'));
    }
    public function category($id)
    {
        $sp=Product::where('category_id', $id)->paginate(8);
        $category = Category::all();
        $ca=Category::where('id',$id)->first();
        $name=$ca->name;
        return view('layout.Product_Loai', compact('sp', 'category','name'));
    }
    
}
