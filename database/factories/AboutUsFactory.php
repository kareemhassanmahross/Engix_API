<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AboutUs>
 */
class AboutUsFactory extends Factory
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
            'whoWeAreAr' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'whoWeAreEn' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'ourVisionAr' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'ourVisionEn' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'ourMissionAr' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'ourMissionEn' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iure voluptatum dolores porro incidunt ex blanditiis posimus et eos deleniti',
            'locationAr' => 'Cairo , Egypt',
            'locationEn' => 'Cairo , Egypt',
        ];
    }
}
