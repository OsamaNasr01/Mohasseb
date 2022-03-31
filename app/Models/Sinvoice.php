<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinvoice extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'client_id',
        'value',
    ];

    public function clients() {
        return $this -> belongsto(Client::class, 'client_id', 'id');
    }

    
    
    public function inventryout() {
        return $this -> hasMany(Inventryout::class, 'sinvoice_id', 'id');
    }
}
