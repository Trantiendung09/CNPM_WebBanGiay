<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table='photo';
    public function products(){
        return $this->hasone(Product::class,'photo_id','id');
    } 
}
