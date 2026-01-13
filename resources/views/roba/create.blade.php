{{-- resources/views/roba/create.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Dodaj robu</h2>
        <a href="{{ route('robas.index') }}" class="btn btn-outline-secondary">Nazad</a>
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
            <form method="POST" action="{{ route('robas.store') }}">
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
                    <label for="kolicina" class="form-label">Količina</label>
                    <input type="number" id="kolicina" name="kolicina"
                           class="form-control @error('kolicina') is-invalid @enderror"
                           value="{{ old('kolicina') }}"
                           required>
                    @error('kolicina') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="jedinica_mere" class="form-label">Jedinica mere</label>
                    <input type="text" id="jedinica_mere" name="jedinica_mere"
                           class="form-control @error('jedinica_mere') is-invalid @enderror"
                           value="{{ old('jedinica_mere') }}"
                           maxlength="10"
                           required>
                    @error('jedinica_mere') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="cena" class="form-label">Cena</label>
                    <input type="number" id="cena" name="cena"
                           class="form-control @error('cena') is-invalid @enderror"
                           value="{{ old('cena') }}"
                           required>
                    @error('cena') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Sačuvaj</button>
                <a href="{{ route('robas.index') }}" class="btn btn-outline-secondary">Otkaži</a>
            </form>
        </div>
    </div>

</div>
@endsection
