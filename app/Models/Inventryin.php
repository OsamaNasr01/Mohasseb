<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventryin extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'product_id',
        'pinvoice_id',
        'no',
        'price',
    ];

    public function product () {
        return $this -> belongsTo(Product::class);
    }

    public function pinvoice () {
        return $this -> belongsTo(Pinvoice::class);
    }

}
