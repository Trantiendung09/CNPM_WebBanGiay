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
    public function show($id)
    {
        $result='';
        $order=Order::find($id);
        $orderdetail=OrderDetail::where('order_id',$order->id)->get();
        foreach($orderdetail as $item){
            if($item->discount!=null||$item->discount!=0){
            $money=($item->quantity*$item->productname->price)*(1-$item->discount/100);
            }else{
                $money=($item->quantity*$item->productname->price);
            }
            $result='<tr>
            <th scope="row">'.$item->productname->name.'</th>
            <td>'.$item->productname->size.'</td>
            <td>'.$item->productname->color.'</td>
            <td>'.$item->quantity.'</td>'.$item->productname->price.'<td>'.$item->discount.'</td>
            <td></td><td>'.$money.'</td>
             </tr>';
        }
        return response()->json($result);
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
        $model=Order::where($id,'id')->get();
        $orderdetail=OrderDetail::find('order_id',$id);
        dd($model);
        return response()->json(['data'=>$orderdetail]);

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
