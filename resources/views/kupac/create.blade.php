{{-- resources/views/kupac/create.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Novi kupac</h2>
        <a href="{{ route('kupacs.index') }}" class="btn btn-outline-secondary">Nazad</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Greška:</strong> Proveri unete podatke.
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('kupacs.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="ime" class="form-label">Ime</label>
                    <input
                        type="text"
                        id="ime"
                        name="ime"
                        class="form-control @error('ime') is-invalid @enderror"
                        value="{{ old('ime') }}"
                        maxlength="150"
                        required
                    >
                    @error('ime')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="kontakt" class="form-label">Kontakt</label>
                    <input
                        type="text"
                        id="kontakt"
                        name="kontakt"
                        class="form-control @error('kontakt') is-invalid @enderror"
                        value="{{ old('kontakt') }}"
                        maxlength="20"
                        required
                    >
                    @error('kontakt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Sačuvaj</button>
                    <a href="{{ route('kupacs.index') }}" class="btn btn-outline-secondary">Otkaži</a>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
