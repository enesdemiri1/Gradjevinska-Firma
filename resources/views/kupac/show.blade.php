{{-- resources/views/kupac/show.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Kupac #{{ $kupac->id }}</h2>
        <div class="d-flex gap-2">
            <a href="{{ route('kupacs.index') }}" class="btn btn-outline-secondary">Nazad</a>
            <a href="{{ route('kupacs.edit', $kupac->id) }}" class="btn btn-outline-warning">Izmeni</a>

            <form method="POST"
                  action="{{ route('kupacs.destroy', $kupac->id) }}"
                  class="d-inline"
                  onsubmit="return confirm('Obrisati kupca?');">
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
            <div class="mb-3">
                <div class="text-muted">Ime</div>
                <div class="fs-5">{{ $kupac->ime }}</div>
            </div>

            <div class="mb-0">
                <div class="text-muted">Kontakt</div>
                <div class="fs-5">{{ $kupac->kontakt }}</div>
            </div>
        </div>
    </div>

</div>
@endsection
