<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DobavljacSeeder extends Seeder
{
    public function run()
    {
        DB::table('dobavljacs')->insert([
            ['naziv' => 'TehnoPlus', 'adresa' => 'Beograd'],
            ['naziv' => 'IT World', 'adresa' => 'Novi Sad'],
            ['naziv' => 'Elektronika RS', 'adresa' => 'Nis'],
            ['naziv' => 'MegaTrade', 'adresa' => 'Kragujevac'],
            ['naziv' => 'Digital Shop', 'adresa' => 'Subotica'],
            ['naziv' => 'PC Centar', 'adresa' => 'Cacak'],
        ]);
    }
}
