<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'NumeroPedido' => fake()->numberBetween(0, 99990),
            'DtPedido' => fake()->dateTime(),
            'Status'=>fake()->randomElement(['Em Aberto','Pago','Cancelado']),
            'Quantidade' => fake()->numberBetween(1,10),
            'Customer_id' => Customer::all()->random()->id,
            'Product_id' => Product::all()->random()->id,

        ];
    }
}
