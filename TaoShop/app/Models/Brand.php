<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table='brand';
    protected $fillable=['name','logo'];
   
    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    } 
    // the localscope để định nghĩa các phương thức trong model 
    public function scopeSearch($query){
        if($key=request()->key){
            $query=$query->where('name','like','%'.$key.'%');
        }
    }

}
