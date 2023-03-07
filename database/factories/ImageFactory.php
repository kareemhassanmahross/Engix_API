<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = [
            'http://127.0.0.1:8000/images/subcategory/Image1677722108.jpg',
            'http://127.0.0.1:8000/images/subcategory/Image1677722093.jpg',
            'http://127.0.0.1:8000/images/category/Image1677720236.jpg',
            'http://127.0.0.1:8000/images/category/Image1677502014.jpg',
            'http://127.0.0.1:8000/images/subcategory/Image1677502193.jpg',
        ];
        shuffle($image);
        return [
            'image' => $image[0],
            'product_id' => random_int(1, 100),
        ];
    }
}