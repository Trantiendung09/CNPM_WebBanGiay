<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table='orderdetail';
    protected $fillable=[
        'product_id',
        'discount',
        'quantity',
        'order_id',
        'created_at'
    ];
    public function productname(){
        return $this->hasOne(Product::class,'id','product_id');
    }
}
