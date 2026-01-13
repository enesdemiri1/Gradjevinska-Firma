{{-- resources/views/dobavljac/create.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Dodaj dobavljača</h2>
        <a href="{{ route('dobavljacs.index') }}" class="btn btn-outline-secondary">Nazad</a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('dobavljacs.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="naziv" class="form-label">Naziv</label>
                    <input type="text" id="naziv" name="naziv"
                           class="form-control @error('naziv') is-invalid @enderror"
                           value="{{ old('naziv') }}"
                           maxlength="150"
                           required>
                    @error('naziv') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="adresa" class="form-label">Adresa</label>
                    <input type="text" id="adresa" name="adresa"
                           class="form-control @error('adresa') is-invalid @enderror"
                           value="{{ old('adresa') }}"
                           maxlength="200"
                           required>
                    @error('adresa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Sačuvaj</button>
                <a href="{{ route('dobavljacs.index') }}" class="btn btn-outline-secondary">Otkaži</a>
            </form>
        </div>
    </div>

</div>
@endsection
