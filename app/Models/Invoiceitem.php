<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoiceitem extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'product_id',
        'no',
    ];



    public function product() {
        return $this -> belongsTo(Product::class);
    }

    public function prices() {
        return $this->hasOneThrough(Price::class, Product::class);
    }

}
