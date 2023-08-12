<?php

namespace Database\Factories;

use App\Models\Customer;
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
    public function definition(): array
    {
        return [
            'customer_id' => Customer::factory(),
            'order_date' => fake()->dateTime(),
            'order_status' => fake()->numberBetween(1, 4),
            'shipping_address' => fake()->address(),
            'total_amount' => fake()->numberBetween(5, 1000),
            'notes' => fake()->sentence()
        ];
    }
}
