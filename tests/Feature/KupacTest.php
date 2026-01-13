<?php

namespace Tests\Feature;

use App\Models\Kupac;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KupacTest extends TestCase
{
    use RefreshDatabase;

    public function test_kupac_can_be_created()
    {
        $kupac = Kupac::create([
            'ime' => 'Test Kupac',
            'kontakt' => 'test@test.com',
        ]);

        $this->assertDatabaseHas('kupacs', [
            'ime' => 'Test Kupac',
        ]);
    }
}
