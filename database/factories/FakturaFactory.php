<?php

namespace Database\Factories;

use App\Models\Kupac;
use Illuminate\Database\Eloquent\Factories\Factory;

class FakturaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'datum' => fake()->date(),
            'ukupno' => fake()->numberBetween(-10000, 10000),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'cena' => fake()->numberBetween(-10000, 10000),
            'kupac_id' => Kupac::factory(),
        ];
    }
}
