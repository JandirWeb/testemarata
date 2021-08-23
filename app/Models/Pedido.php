<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $casts = [
        'itens' => 'array'
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    protected $guarded = [];
}
