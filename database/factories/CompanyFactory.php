<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'serialNumber' => fake()->unique()->regexify('[A-Z0-9]{10}'),
            'name' => fake()->company,
            'address' => fake()->address,
            'contact' => fake()->phoneNumber,
            'email' => fake()->email,
        ];
    }
}
