<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KupacSeeder extends Seeder
{
    public function run()
    {
        DB::table('kupacs')->insert([
            ['ime' => 'Marko Markovic', 'kontakt' => 'marko@gmail.com'],
            ['ime' => 'Ana Petrovic', 'kontakt' => 'ana@gmail.com'],
            ['ime' => 'Ivan Ilic', 'kontakt' => 'ivan@gmail.com'],
            ['ime' => 'Jelena Jovanovic', 'kontakt' => 'jelena@gmail.com'],
            ['ime' => 'Nikola Nikolic', 'kontakt' => 'nikola@gmail.com'],
            ['ime' => 'Maja Savic', 'kontakt' => 'maja@gmail.com'],
        ]);
    }
}
