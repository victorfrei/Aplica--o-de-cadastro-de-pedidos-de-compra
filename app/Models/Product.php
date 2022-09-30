<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'CodBarra',
        'NomeProduto',
        'ValorUnitario'
    ];

    public function Pedidos()
    {
        return $this->hasMany(related: Order::class);
    }
}
