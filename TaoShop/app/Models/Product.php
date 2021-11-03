<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


class Product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable=[
        'name',
        'photo_id',
        'brand_id',
        'category_id', 
        'color', 
        'size',
        'price',
        'discount',
        'note',
        'quantity',
        'created_at',
        'update_at'
    ];
    public function categoryname(){
        return  $this->hasOne(Category::class,'id','category_id');
    }
    public function  brandname(){
        return  $this->hasOne(Brand::class,'id','brand_id');
    }
    public function photoname(){
        return  $this->hasOne(Photo::class,'id','photo_id');
    }
    //create scopeSeachr()
    public function  scopeSearch($query){
          if($key=request()->key){
              $query=$query->where('name','like','%'.$key.'%');
          }
    }
    // join order_detail
    public function orderdetail(){
        return $this->hasMany(OrderDetail::class,'product_id','id');
    }
    public function cart(){
        return $this->hasMany(Cart::class,'product_id','id');
    }
}
