<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\product\storeRequest;
use App\Http\Requests\C;
use App\Models\Cart;
use App\Models\Photo;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function detail(Request $id)
    {
        $sps=Product::
        where('id',$id->id)->first();
        $category=Category::all();
        $list=Product::orderby('created_at','DESC')
        ->where([['category_id',$sps->category_id],['id','!=',$id->id]])
        ->paginate(6);
        $brands=Brand::all();
        $brandss=[];
        foreach($brands as $brand)
        {
            $brandsss=Product::where('brand_id',$brand->id)->count();
            $brandss[''.$brand->id]=''. $brandsss;
        }
        return view('layout.product_detail',compact('sps','category','list','brands','brandss'));
    }
    public function addToCart($id)
    {
        // session()->forget('cart');
        $product = Product::find($id);
        $anh=Photo::where('id',$product->photo_id)->first();
        
        $cart = session('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image'=> $anh->photo_n1
            ];
        }
        session()->put('cart', $cart);
        return response()->json(['data'=>'Thêm sản phẩm thành công']);
    }

    public function showcart()
    {
        if (!session()->has('cart')) {
            return redirect()->route('home.index');
        }
        $carts = session('cart');
        $total=0;
        foreach($carts as $sp)
        {
            $total+=$sp['quantity']*$sp['price'];
        }
        $category=Category::all();
        
        // print_r(session('cart'));
        return view('layout.Cart', compact('carts','total','category'));
    }
    public function updatecart(Request $request)
    {
        if($request->id && $request->quantity)
        {
        $cart=session('cart');
        $cart[$request->id]['quantity']=$request->quantity;
        session()->put('cart',$cart);
        $carts=session('cart');
        $total=0;
        foreach($carts as $sp)
        {
            $total+=$sp['quantity']*$sp['price'];
        }
        $view=view('layout.cart_product',compact('carts'));
        return response()->json(['view'=>$view,'total'=>$total]);
        }
    }
    public function deletecart(Request $request)
    {
        if($request->id)
        {
        $cart=session('cart');
        unset($cart[$request->id]);
        session()->put('cart',$cart);
        $carts=session('cart');
        $total=0;
        foreach($carts as $sp)
        {
            $total+=$sp['quantity']*$sp['price'];
        }
        $view=view('layout.cart_product',compact('carts'))->render();
        return response()->json(['view'=>$view,'total'=>$total]);
        }

    }
    public function thanhtoan(C $request)
    {
        if (!session()->has('cart')) {
            return redirect()->route('home.index');
        }
        $request->validate(['name'=>'required']);
        $carts = session('cart');
        $customer=new Customer;
        $customer->name=$request->name;
        $customer->fullname=$request->fullname;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->adress=$request->adress;
        $customer->save();
        $order=new Order;
        $total=0;
        $order->customer_id=$customer->id;
        foreach($carts as $sp)
        {
            $total+=$sp['quantity']*$sp['price'];
        }
        $order->total=$total;
        $order->save();
        // dd($order->customer_id);
        foreach($carts as $cart)
        {
            $order_detail=new OrderDetail;
            $order_detail->order_id=$order->id;
            $order_detail->product_id=Product::where('name',$cart['name'])->first()->id;
            $order_detail->quantity=$cart['quantity'];
            $order_detail->save();
        }
        $s= $customer->id;
        $category=Category::all();
        // return redirect()->route('home.index');
        // return response()->json((['s'=>$s]));
        $cart_done=$carts;
        session()->forget('cart');
        return view('layout.cart_done',compact('total','customer','category','cart_done'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Product::orderBy('id','DESC')->Search()->paginate(10);
        return view('Layout_admin.product.index',compact('data'),[
            'titel'=>'trang danh sách sản phẩm'
        ]);   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat=Category::orderBy('id','ASC')->select('id','name')->get();
        $brand=Brand::orderBy('id','ASC')->select('id','name')->get();
        $photo=Photo::orderBy('id','DESC')->select('id')->get();
       return view('Layout_admin.product.create',[
           'titel'=>'trang tạo mới sản phẩm'
       ],compact('cat','brand','photo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        // try{
        //     // $this->validate($request,[
        //     //     'name'=>'required',
        //     //     'logo' =>'required'
        //     // ]);
        //    Category::create([
        //     "name"=>(string) $request->input('name'),
        //     "logo"=>(string) $request->input('logo')
        //    ]);
        //   }catch(\Exception $error){
        //     Session::flash("error",$error->getMessage());
        //     return back()->withErrors([
        //         'error' => 'Vui lòng nhập đủ thông tin cần thiết.'
        //     ]);
        // }
       if(Product::create($request->all()))
       {
        return redirect()->route('product.index')->with('success','Thêm mới thành công');   
       }
       else
       return redirect()->back()->with('error','Thêm mới thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $data=Product::find($id);
        $cat=Category::orderBy('id','ASC')->where('id','!=',$data->category_id)->select('id','name')->get();
        $brand=Brand::orderBy('id','ASC')->where('id','!=',$data->brand_id)->select('id','name')->get();
        $photo=Photo::orderBy('id','DESC')->select('id')->get();
        $category_name=$data->categoryname()->select('id','name')->get();
        $brand_name=$data->brandname()->select('id','name')->get();
        $catname=$category_name[0]->name;
        $brandname=$brand_name[0]->name;
        if($data->count()>0){
            return view('Layout_admin.product.edit',[
                'titel'=>'Trang sửa thông tin'
            ],compact('data','cat','brand','photo','catname','brandname')); 
        }else
        {
            return redirect()->route('product.index')->with('error','không tìm thấy');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(storeRequest $request,$id)
    {
        $product=Product::find($id);
        $product->update($request->all());
        return redirect()->route('product.index')->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // trước khi xóa cần kiểm tra liên kết khóa ngoại 
       // bảng chi tiết hóa đơn và bảng giỏ hàng.
       $product=Product::find($id);
       if($product->orderdetail->count()>0||$product->cart->count()>0){
           return redirect()->route('product.index')->with('error','không thể xóa sản phẩm trong hóa đơn');
       }
       else{
           $product->delete();
           return redirect()->route('product.index')->with('success','xóa sản phẩm thành công');
       }
    }
}
