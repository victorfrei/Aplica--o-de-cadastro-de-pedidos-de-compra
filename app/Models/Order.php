<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'NumeroPedido',
        'DtPedido',
        'Quantidade',
        'fk_IdCliente',
        'fk_IdProduto',
    ];
}
