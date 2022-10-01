<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'NumeroPedido',
        'DtPedido',
        'Quantidade',
        'Status',
        'Customer_id',
        'Product_id',
    ];




    public function Cliente()
    {
        return $this->belongsTo(related: Customer::class);
    }

    public function Produto()
    {
        return $this->belongsTo(related: Product::class);
    }
}
