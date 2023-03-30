<?php

namespace Database\Seeders;

use App\Http\Controllers\Api\dashbord\CategoryProgram\CategoryProgramController;
use App\Models\CategoryProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryProgram::factory(5)->create();
    }
}
