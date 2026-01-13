{{-- resources/views/roba/index.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Roba</h2>
        <a href="{{ route('robas.create') }}" class="btn btn-primary">+ Dodaj robu</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(!empty($robas) && count($robas) > 0)
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th style="width:80px;">ID</th>
                            <th>Naziv</th>
                            <th>Količina</th>
                            <th>Jedinica mere</th>
                            <th>Cena</th>
                            <th class="text-end" style="width:260px;">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($robas as $roba)
                            <tr>
                                <td>{{ $roba->id }}</td>
                                <td>{{ $roba->naziv }}</td>
                                <td>{{ $roba->kolicina }}</td>
                                <td>{{ $roba->jedinica_mere }}</td>
                                <td>{{ $roba->cena }}</td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-secondary"
                                       href="{{ route('robas.show', $roba->id) }}">Prikaži</a>

                                    <a class="btn btn-sm btn-outline-warning"
                                       href="{{ route('robas.edit', $roba->id) }}">Izmeni</a>

                                    <form class="d-inline"
                                          method="POST"
                                          action="{{ route('robas.destroy', $roba->id) }}"
                                          onsubmit="return confirm('Obrisati robu?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info">Nema unete robe.</div>
    @endif

</div>
@endsection
