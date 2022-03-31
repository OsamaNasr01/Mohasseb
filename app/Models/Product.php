<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Collection;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'brand_id',
    ];

    public function brand() {
        return $this -> belongsTo(Brand::class);
    }

    
    public function prices() {

        // return $this -> hasOne(Price::class, 'product_id', 'id');
        return $this -> hasOne(Price::class, 'product_id', 'id') -> oldestOfMany();
    }

    
    public function items() {

        // return $this -> hasOne(Price::class, 'product_id', 'id');
        return $this -> hasOne(Item::class, 'product_id', 'id');
    }

    
    public function inventryin() {
        return $this -> hasMany(Inventryin::class);
    }


    public function inventryout() {
        return $this -> hasMany(Inventryout::class);
    }


}
