<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function detail(Request $id)
    {
        $sps = Product::where('id', $id->id)->first();
        return view('layout.product_detail', compact('sps'));
    }
    public function addToCart($id)
    {
        // session()->forget('cart');
        $product = Product::find($id);
        $cart = session('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        print_r(session('cart'));
    }

    public function showcart()
    {
        $carts = session('cart');
        $total=0;
        foreach($carts as $sp)
        {
            $total+=$sp['quantity']*$sp['price'];
        }
        // print_r(session('cart'));
        return view('layout.Cart', compact('carts','total'));
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
        $view=view('layout.cart_product',compact('carts'))->render();
        return response()->json(['cart_product'=>$view,'total'=>$total]);
        }
    }
    public function thanhtoan(Request $request)
    {
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
        $order->customer_id=$customer->id;
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
        return response()->json((['s'=>$s]));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
