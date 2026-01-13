@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Nova faktura</h2>
        <a href="{{ route('fakturas.index') }}" class="btn btn-outline-secondary">Nazad</a>
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
            <form method="POST" action="{{ route('fakturas.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="datum">Datum</label>
                    <input type="date" id="datum" name="datum"
                           class="form-control @error('datum') is-invalid @enderror"
                           value="{{ old('datum') }}" required>
                    @error('datum') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="ukupno">Ukupno</label>
                    <input type="number" id="ukupno" name="ukupno"
                           class="form-control @error('ukupno') is-invalid @enderror"
                           value="{{ old('ukupno') }}" required>
                    @error('ukupno') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kolicina">Količina</label>
                    <input type="number" id="kolicina" name="kolicina"
                           class="form-control @error('kolicina') is-invalid @enderror"
                           value="{{ old('kolicina') }}" required>
                    @error('kolicina') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="cena">Cena</label>
                    <input type="number" id="cena" name="cena"
                           class="form-control @error('cena') is-invalid @enderror"
                           value="{{ old('cena') }}" required>
                    @error('cena') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="kupac_id">Kupac</label>
                    <select id="kupac_id" name="kupac_id"
                            class="form-select @error('kupac_id') is-invalid @enderror"
                            required>
                        <option value="" disabled {{ old('kupac_id') ? '' : 'selected' }}>-- Izaberi kupca --</option>
                        @foreach($kupacs as $kupac)
                            <option value="{{ $kupac->id }}"
                                {{ (string)old('kupac_id') === (string)$kupac->id ? 'selected' : '' }}>
                                {{ $kupac->ime }}
                            </option>
                        @endforeach
                    </select>
                    @error('kupac_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button class="btn btn-primary" type="submit">Sačuvaj</button>
                <a href="{{ route('fakturas.index') }}" class="btn btn-outline-secondary">Otkaži</a>
            </form>
        </div>
    </div>

</div>
@endsection
