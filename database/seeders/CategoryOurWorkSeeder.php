<?php

namespace Database\Seeders;

use App\Models\categoryOurWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryOurWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categoryOurWork::factory(3)->create();
    }
}
