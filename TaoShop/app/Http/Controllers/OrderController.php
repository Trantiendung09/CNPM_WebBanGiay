<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model=Order::orderby('created_at','DESC')->paginate(5);
        return view('Layout_admin.order.index',[
            'titel'=>'Trang hóa đơn'
        ],compact('model'));
    }
    public function wait(){
        $model=Order::orderby('created_at','ASC')->where('status',0)->paginate(5);
        return view('Layout_admin.order.orderwait',[
            'titel'=>'Hóa đơn đang chờ xử lý'
        ],compact('model'));
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // tổng thể
        // mã hóa đơn, tổng số tiền ,tên khách hàng, địa chỉ,sđt
        // từng hóa đơn
        // mặt hàng , size , màu ,giá ,giảmhđ,
        $model=Order::find('id',$id)->first();
        dd($model);
        $orderdetail=OrderDetail::find('order_id',$id);
        dd($orderdetail);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
