<?php

namespace Database\Factories;

use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => fake()->date(),
            'total' => fake()->numberBetween(100,10000),
            'invoice_no' => fake()->numberBetween(100,10000),
            'supplier_id' => fake()->randomElement(Supplier::pluck('id')),
            'user_id' => fake()->randomElement(User::pluck('id')),
        ];
    }
}
