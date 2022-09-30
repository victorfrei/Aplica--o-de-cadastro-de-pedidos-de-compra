<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomeCliente',
        'CPF',
        'Email'
    ];

    public function Pedidos()
    {
        return $this->hasMany(related: Order::class);
    }
}
