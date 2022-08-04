<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pack>
 */
class PackFactory extends Factory
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
            'senderFirstName' => fake()->firstName,
            'senderLastName' => fake()->lastName,
            'senderContact' => fake()->phoneNumber,
            'recipientFirstName' => fake()->firstName,
            'recipientLastName' => fake()->lastName,
            'recipientContact' => fake()->phoneNumber,
            'recipientAddress' => fake()->address,
            'description' => fake()->paragraph,
            'isDelivered' => rand(0, 1),
            'user_id' => User::all()->where('profile_id', Profile::where('name', 'Convoyeur')->first()->id)->random(),
        ];
    }
}
