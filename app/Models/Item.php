<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'no',
    ];



    // public function product() {
    //     return $this->hasMany(Product::class);
    // }

    public function prices() {
        return $this->hasOneThrough(Price::class, Product::class);
    }

    
    public function product() {
        return $this -> belongsTo(Product::class);
    }

}
