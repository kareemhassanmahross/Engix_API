<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meduol>
 */
class MeduolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nameAr' => fake()->name(),
            'nameEn' => fake()->name(),
            'programs_id' => random_int(1, 100),
        ];
    }
}