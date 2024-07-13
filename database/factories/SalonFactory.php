<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SalonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naziv' => $this->faker->company(),
            'vlasnik' => $this->faker->name(),
            'adresa' => $this->faker->streetAddress(),
            'grad' => $this->faker->city(),
            'website' => $this->faker->url()
        ];
    }
}