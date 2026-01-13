{{-- resources/views/dobavljac/show.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Dobavljač #{{ $dobavljac->id }}</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('dobavljacs.index') }}" class="btn btn-outline-secondary">Nazad</a>
            <a href="{{ route('dobavljacs.edit', $dobavljac->id) }}" class="btn btn-outline-warning">Izmeni</a>

            <form method="POST"
                  action="{{ route('dobavljacs.destroy', $dobavljac->id) }}"
                  class="d-inline"
                  onsubmit="return confirm('Obrisati dobavljača?');">
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
                    <div class="fs-5">{{ $dobavljac->naziv }}</div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted">Adresa</div>
                    <div class="fs-5">{{ $dobavljac->adresa }}</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
