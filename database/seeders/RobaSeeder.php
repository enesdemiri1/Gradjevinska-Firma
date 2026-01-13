<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RobaSeeder extends Seeder
{
    public function run()
    {
        DB::table('robas')->insert([
            ['naziv' => 'Laptop HP', 'kolicina' => 10, 'jedinica_mere' => 'kom', 'cena' => 850],
            ['naziv' => 'Monitor LG', 'kolicina' => 15, 'jedinica_mere' => 'kom', 'cena' => 300],
            ['naziv' => 'Tastatura', 'kolicina' => 30, 'jedinica_mere' => 'kom', 'cena' => 40],
            ['naziv' => 'Mis Logitech', 'kolicina' => 25, 'jedinica_mere' => 'kom', 'cena' => 50],
            ['naziv' => 'Stampac', 'kolicina' => 5, 'jedinica_mere' => 'kom', 'cena' => 200],
            ['naziv' => 'USB Flash', 'kolicina' => 100, 'jedinica_mere' => 'kom', 'cena' => 10],
        ]);
    }
}
