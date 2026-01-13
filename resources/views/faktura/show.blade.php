{{-- resources/views/faktura/show.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Faktura #{{ $faktura->id }}</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('fakturas.index') }}" class="btn btn-outline-secondary">Nazad</a>
            <a href="{{ route('fakturas.edit', $faktura->id) }}" class="btn btn-outline-warning">Izmeni</a>

            <form method="POST"
                  action="{{ route('fakturas.destroy', $faktura->id) }}"
                  class="d-inline"
                  onsubmit="return confirm('Obrisati fakturu?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Obriši</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="text-muted">Datum</div>
                    <div class="fs-5">{{ $faktura->datum }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted">Ukupno</div>
                    <div class="fs-5">{{ $faktura->ukupno }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted">Kupac</div>
                    <div class="fs-5">{{ $faktura->kupac->ime ?? ('Kupac #' . $faktura->kupac_id) }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted">Količina</div>
                    <div class="fs-5">{{ $faktura->kolicina }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted">Cena</div>
                    <div class="fs-5">{{ $faktura->cena }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
