<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frizer;

class FrizerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frizer::factory()->count(40)->create();
    }
}
