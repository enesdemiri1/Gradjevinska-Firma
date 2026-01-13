<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RobaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{150}'),
            'kolicina' => fake()->numberBetween(-10000, 10000),
            'jedinica_mere' => fake()->text(),
            'cena' => fake()->numberBetween(-10000, 10000),
        ];
    }
}
