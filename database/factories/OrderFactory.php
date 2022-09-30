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
            'Quantidade' => fake()->randomDigit(),
            'Customer_id' => Customer::all()->random()->id,
            'Product_id' => Product::all()->random()->id,

        ];
    }
}
