<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiptin extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'client_id',
        'value',
    ];

    public function clients() {
        return $this -> belongsTo(Client::class, 'client_id', 'id');
    }
}
