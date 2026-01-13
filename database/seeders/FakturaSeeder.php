<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FakturaSeeder extends Seeder
{
    public function run()
    {
        DB::table('fakturas')->insert([
            ['datum' => '2025-01-10', 'ukupno' => 850, 'kolicina' => 1, 'cena' => 850, 'kupac_id' => 1],
            ['datum' => '2025-01-11', 'ukupno' => 300, 'kolicina' => 1, 'cena' => 300, 'kupac_id' => 2],
            ['datum' => '2025-01-12', 'ukupno' => 80, 'kolicina' => 2, 'cena' => 40, 'kupac_id' => 3],
            ['datum' => '2025-01-13', 'ukupno' => 50, 'kolicina' => 1, 'cena' => 50, 'kupac_id' => 4],
            ['datum' => '2025-01-14', 'ukupno' => 200, 'kolicina' => 1, 'cena' => 200, 'kupac_id' => 5],
            ['datum' => '2025-01-15', 'ukupno' => 100, 'kolicina' => 10, 'cena' => 10, 'kupac_id' => 6],
        ]);
    }
}
