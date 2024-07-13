<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SalonSeeder;
use Database\Seeders\FrizerSeeder;
use Database\Seeders\MusterijaSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $salonSeeder = new SalonSeeder();
        $frizerSeeder = new FrizerSeeder();
        $musterijaSeeder = new MusterijaSeeder();

        $salonSeeder->run();
        $frizerSeeder->run();
        $musterijaSeeder->run();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
