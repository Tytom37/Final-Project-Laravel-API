<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merchandise>
 */
class MerchandiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->name(),
            'description' => fake()->name(),
            'retail_price' => fake()->randomFloat(2, 1, 10000),
            'whole_sale_price' => fake()->randomFloat(2, 1000, 100000),
            'whole_sale_qty' => fake()->numberBetween(100,10000),
            'qty_stock' => fake()->numberBetween(1,100000)
        ];
    }
}
