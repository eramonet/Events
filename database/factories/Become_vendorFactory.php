<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Become_vendor>
 */
class Become_vendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'coment' => $this->faker->sentence,
            'sign_from' => $this->faker->randomElement(['web', 'ios', 'android']),
            'status' => $this->faker->randomElement(['pending', 'accepted', 'canceled']),
        ];
    }
}
