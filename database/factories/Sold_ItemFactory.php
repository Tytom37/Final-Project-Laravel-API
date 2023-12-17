<?php

namespace Database\Factories;

use App\Models\Merchandise;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sold_Item>
 */
class Sold_ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'merchandise_id' => fake()->randomElement(Merchandise::pluck('id')),
            'sale_id' => fake()->randomElement(Sale::pluck('id')),
            'qty' => fake()->numberBetween(100,10000),
            'selling_price' => fake()->randomFloat(2, 1000, 100000),
        ];
    }
}
