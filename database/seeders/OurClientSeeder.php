<?php

namespace Database\Seeders;

use App\Models\OurClient;
use Illuminate\Database\Seeder;

class OurClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OurClient::factory(18)->create();
    }
}
