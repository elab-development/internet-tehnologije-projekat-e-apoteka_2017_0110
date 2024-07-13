<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Musterija;


class MusterijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musterija::factory()->count(50)->create();
    }
}
