<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactUs>
 */
class ContactUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => fake()->email(),
            'phone' => fake()->phoneNumber(),
            'whatsApp' => fake()->phoneNumber(),
            'tel' => fake()->phoneNumber(),
        ];
    }
}
