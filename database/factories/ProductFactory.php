<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'CodBarra' => fake()->isbn13(),
            'NomeProduto' => fake()->words(3,true),
            'ValorUnitario' => fake()->randomFloat(2,15,70)
        ];
    }
}
