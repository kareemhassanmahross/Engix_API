<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
            'Store',
        ];
        $image = [
            'http://127.0.0.1:8000/images/subcategory/Image1677722108.jpg',
            'http://127.0.0.1:8000/images/subcategory/Image1677722093.jpg',
            'http://127.0.0.1:8000/images/category/Image1677720236.jpg',
            'http://127.0.0.1:8000/images/category/Image1677502014.jpg',
            'http://127.0.0.1:8000/images/subcategory/Image1677502193.jpg',
        ];
        shuffle($brans);
        shuffle($image);
        return [
            'image' => $image[0],
            "categoryNameAr" => fake()->name(),
            "categoryNameEn" => fake()->name(),
            "desctriptionAr" => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            "desctriptionEn" => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            "prand" => $brans[0],
        ];
    }
}
