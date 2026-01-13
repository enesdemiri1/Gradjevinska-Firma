<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Faktura;
use App\Models\Kupac;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FakturaController
 */
final class FakturaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = \App\Models\User::factory()->create();
        $this->actingAs($this->user);
    }


    #[Test]
    public function index_displays_view(): void
    {
        $fakturas = Faktura::factory()->count(3)->create();

        $response = $this->get(route('fakturas.index'));

        $response->assertOk();
        $response->assertViewIs('faktura.index');
        $response->assertViewHas('fakturas', $fakturas);
    }

    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('fakturas.create'));

        $response->assertOk();
        $response->assertViewIs('faktura.create');
    }

    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FakturaController::class,
            'store',
            \App\Http\Requests\FakturaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $datum = Carbon::parse(fake()->date());
        $ukupno = fake()->numberBetween(-10000, 10000);
        $kolicina = fake()->numberBetween(-10000, 10000);
        $cena = fake()->numberBetween(-10000, 10000);
        $kupac = Kupac::factory()->create();

        $response = $this->post(route('fakturas.store'), [
            'datum' => $datum->toDateString(),
            'ukupno' => $ukupno,
            'kolicina' => $kolicina,
            'cena' => $cena,
            'kupac_id' => $kupac->id,
        ]);

        $fakturas = Faktura::query()
            ->where('datum', $datum)
            ->where('ukupno', $ukupno)
            ->where('kolicina', $kolicina)
            ->where('cena', $cena)
            ->where('kupac_id', $kupac->id)
            ->get();
        $this->assertCount(1, $fakturas);
        $faktura = $fakturas->first();

        $response->assertRedirect(route('fakturas.index'));
        $response->assertSessionHas('faktura.id', $faktura->id);
    }

    #[Test]
    public function show_displays_view(): void
    {
        $faktura = Faktura::factory()->create();

        $response = $this->get(route('fakturas.show', $faktura));

        $response->assertOk();
        $response->assertViewIs('faktura.show');
        $response->assertViewHas('faktura', $faktura);
    }

    #[Test]
    public function edit_displays_view(): void
    {
        $faktura = Faktura::factory()->create();

        $response = $this->get(route('fakturas.edit', $faktura));

        $response->assertOk();
        $response->assertViewIs('faktura.edit');
        $response->assertViewHas('faktura', $faktura);
    }

    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\FakturaController::class,
            'update',
            \App\Http\Requests\FakturaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $faktura = Faktura::factory()->create();
        $datum = Carbon::parse(fake()->date());
        $ukupno = fake()->numberBetween(-10000, 10000);
        $kolicina = fake()->numberBetween(-10000, 10000);
        $cena = fake()->numberBetween(-10000, 10000);
        $kupac = Kupac::factory()->create();

        $response = $this->put(route('fakturas.update', $faktura), [
            'datum' => $datum->toDateString(),
            'ukupno' => $ukupno,
            'kolicina' => $kolicina,
            'cena' => $cena,
            'kupac_id' => $kupac->id,
        ]);

        $faktura->refresh();

        $response->assertRedirect(route('fakturas.index'));
        $response->assertSessionHas('faktura.id', $faktura->id);

        $this->assertEquals($datum, $faktura->datum);
        $this->assertEquals($ukupno, $faktura->ukupno);
        $this->assertEquals($kolicina, $faktura->kolicina);
        $this->assertEquals($cena, $faktura->cena);
        $this->assertEquals($kupac->id, $faktura->kupac_id);
    }

    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $faktura = Faktura::factory()->create();

        $response = $this->delete(route('fakturas.destroy', $faktura));

        $response->assertRedirect(route('fakturas.index'));

        $this->assertModelMissing($faktura);
    }
}
