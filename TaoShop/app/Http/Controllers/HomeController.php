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
    // trang chủ
    public function index()
    {
        $sp = Product::latest()->paginate(8);
            // $sp = Product::where('price', '>', '1000000')
            // ->where('quantity', '>', '30')
            // ->paginate(5);
        $brands=Brand::all();
        $brandss=[];
        foreach($brands as $brand)
        {
            $brandsss=Product::where('brand_id',$brand->id)->count();
            $brandss[''.$brand->id]=''. $brandsss;
        }
        $category = Category::all();
        return view('layout.home', compact('sp', 'category','brands','brandss'));
    }
    // chi tiết sp
    public function detail(Request $id)
    {
        $sps = Product::where('id', $id->id)->first();
        $category = Category::all();
        return view('layout.product_detail', compact('sps', 'category'));
    }
    // tìm kiếm
    public function search( $name)
    {
        //$sp = DB::table('product')->where('name', 'LIKE', '%' . $name . '%')->get();
        $sp=Product::where('name','like','%'. $name .'%')->get();
        return view('layout.search', compact('sp'));
    }
    //bên phải
    public function menu_vip($loai, $hang)
    {
        $brand=Brand::where('name',$hang)->first();
        $sp=Product::where('category_id', $loai)
        ->where('brand_id', $brand->id)->paginate(4);
        $category = Category::all();
        $loai=Category::where('id',$loai)->first();
        $brands=Brand::all();
        $brandss=[];
        foreach($brands as $brand)
        {
            $brandsss=Product::where('brand_id',$brand->id)->count();
            $brandss[''.$brand->id]=''. $brandsss;
        }
        return view('layout.category', compact('sp', 'category','loai', 'hang','brandss','brands'));
    }
    //bên dưới
    public function category_menu($id)
    {
        // $sp=Product::join('orderdetail', 'product.id','=','orderdetail.product_id')
        // ->select('product.id')->where('product.category_id', $id)
        // ->groupBy('product.id','orderdetail.quantity')
        // ->orderby('sum(orderdetail.quantity)','desc')->take(4)->get();
        $sps = DB::table('product')
                ->join('orderdetail', 'product.id','=','orderdetail.product_id')
                ->select('product.id as id', DB::raw('SUM(orderdetail.quantity) as total_sales'))
                ->where('category_id',$id)
                ->groupBy('product.id')
                ->orderby('total_sales','desc')
                ->take(4)
                ->get();
        $sp=[];
        $k=0;
        foreach($sps as $s)
        {
        $k++;
        $spp=Product::where('id',$s->id)->first();
        $sp[$k]=$spp;
        }
        return view('layout.menu_vip', compact('sp'));
    }
    // trên cùng
    public function category($id)
    {
        $sp=Product::where('category_id', $id)->paginate(8);
        $category = Category::all();
        $ca=Category::where('id',$id)->first();
        $name=$ca->name;
        $brands=Brand::all();
        $brandss=[];
        foreach($brands as $brand)
        {
            $brandsss=Product::where('brand_id',$brand->id)->count();
            $brandss[''.$brand->id]=''. $brandsss;
        }
        return view('layout.Product_Loai', compact('sp', 'category','name','brandss','brands'));
    }
    // loc theo giá
    public function locgia(Request $request)
    {
        $price_start=$request->price_start;
        $price_end=$request->price_end;
        $sp = Product::whereBetween('price',[$price_start,$price_end])->orderBy('price','desc')->paginate(8);
        $category = Category::all();
        $brands=Brand::all();
        $brandss=[];
        foreach($brands as $brand)
        {
            $brandsss=Product::where('brand_id',$brand->id)->count();
            $brandss[''.$brand->id]=''. $brandsss;
        }
        return view('layout.Loc_SP.locgia', compact('sp', 'category','brandss','brands'));
    }
}
