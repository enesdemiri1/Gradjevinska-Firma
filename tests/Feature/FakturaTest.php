<?php

namespace Tests\Feature;

use App\Models\Faktura;
use App\Models\Kupac;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FakturaTest extends TestCase
{
    use RefreshDatabase;

    public function test_faktura_belongs_to_kupac()
    {
        $kupac = Kupac::create([
            'ime' => 'Test Kupac',
            'kontakt' => 'test@test.com',
        ]);

        $faktura = Faktura::create([
            'datum' => now(),
            'ukupno' => 100,
            'kolicina' => 2,
            'cena' => 50,
            'kupac_id' => $kupac->id,
        ]);

        $this->assertEquals($kupac->id, $faktura->kupac_id);
    }
}
