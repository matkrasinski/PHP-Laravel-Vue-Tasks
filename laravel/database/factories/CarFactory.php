<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => Fakecar::vehicleBrand(),
            'model' => Fakecar::vehicleModel(),
            'reg_number' => Fakecar::vehicleRegistration('[A-Z]{2}-[0-9]{5}')
        ];
    }
}
