<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='order';
    protected $fillable=[
        'customer_id',
        'status',
        'total',
        'created_at'
    ];
    //  join 1-1 
    public function customername(){
        return $this->hasOne(Customer::class,'id','customer_id');
    }
    // join 1-n 
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

}
