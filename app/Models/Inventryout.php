<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventryout extends Model
{
    use HasFactory;


    
    protected $fillable = [
        'product_id',
        'no',
        'sinvoice_id',
        'price',
    ];



    public function product() {
        return $this -> belongsTo(Product::class);
    }

    public function prices() {
        return $this->hasOneThrough(Price::class, Product::class);
    }

    
    public function sinvoice () {
        return $this -> belongsTo(Sinvoice::class);
    }
}
