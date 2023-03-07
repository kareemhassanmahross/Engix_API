<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $brans = [
            'Services',
            'Programs',
            'Store',
        ];
        shuffle($brans);
        return [
            'nameAr' => fake()->name(),
            'nameEn' => fake()->name(),
            'descriptionAr' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'descriptionEn' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'price' => '15.00',
            'amount' => random_int(1, 50),
            'sub_category_id' => random_int(1, 50),
            'brand' => $brans[0]
        ];
    }
}