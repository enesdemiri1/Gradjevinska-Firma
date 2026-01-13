{{-- resources/views/roba/show.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Roba #{{ $roba->id }}</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('robas.index') }}" class="btn btn-outline-secondary">Nazad</a>
            <a href="{{ route('robas.edit', $roba->id) }}" class="btn btn-outline-warning">Izmeni</a>

            <form method="POST"
                  action="{{ route('robas.destroy', $roba->id) }}"
                  class="d-inline"
                  onsubmit="return confirm('Obrisati robu?');">
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
                <div class="col-md-6">
                    <div class="text-muted">Naziv</div>
                    <div class="fs-5">{{ $roba->naziv }}</div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted">Količina</div>
                    <div class="fs-5">{{ $roba->kolicina }}</div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted">Jedinica mere</div>
                    <div class="fs-5">{{ $roba->jedinica_mere }}</div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted">Cena</div>
                    <div class="fs-5">{{ $roba->cena }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
