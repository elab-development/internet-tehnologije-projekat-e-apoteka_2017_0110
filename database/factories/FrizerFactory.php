<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Salon;

class FrizerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime' => $this->faker->firstName(),
            'prezime' => $this->faker->lastName(),
            'godRođenja' => $this->faker->numberBetween($min = 1960, $max = 2004),
            'broj_telefona' => $this->faker->phoneNumber(),
            'salon_id' => Salon::factory()
        ];
    }
}