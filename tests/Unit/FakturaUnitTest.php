<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Faktura;

class FakturaUnitTest extends TestCase
{
    public function test_izracunavanje_ukupnog_iznosa()
    {
        $faktura = new Faktura();
        $faktura->kolicina = 4;
        $faktura->cena = 250;

        $this->assertEquals(1000, $faktura->izracunajUkupno());
    }
}
