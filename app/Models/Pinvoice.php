<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinvoice extends Model
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

    
    public function inventryin() {
        return $this -> hasMany(Inventryin::class, 'pinvoice_id', 'id');
    }
}
