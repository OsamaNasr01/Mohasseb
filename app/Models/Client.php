<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'address',
        'description',
        'phone',
    ];

    public function pinvoice() {
        return $this -> hasMany(Pinvoice::class);
    }

    public function sinvoice() {
        return $this -> hasMany(Sinvoice::class);
    }
    public function receiptin() {
        return $this -> hasMany(Receiptin::class);
    }

    public function receiptout() {
        return $this -> hasMany(Receiptout::class);
    }

    public function product() {
        return $this -> hasManyThrough(Product::class, Inventryin::class);
    }
}
