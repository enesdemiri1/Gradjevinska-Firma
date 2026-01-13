{{-- resources/views/faktura/index.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Fakture</h2>
        <a href="{{ route('fakturas.create') }}" class="btn btn-primary">+ Nova faktura</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(!empty($fakturas) && count($fakturas) > 0)
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th style="width:80px;">ID</th>
                            <th>Datum</th>
                            <th>Ukupno</th>
                            <th>Količina</th>
                            <th>Cena</th>
                            <th>Kupac</th>
                            <th class="text-end" style="width:260px;">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($fakturas as $faktura)
                            <tr>
                                <td>{{ $faktura->id }}</td>
                                <td>{{ $faktura->datum }}</td>
                                <td>{{ $faktura->ukupno }}</td>
                                <td>{{ $faktura->kolicina }}</td>
                                <td>{{ $faktura->cena }}</td>
                                <td>{{ $faktura->kupac->ime ?? ('Kupac #' . $faktura->kupac_id) }}</td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-secondary"
                                       href="{{ route('fakturas.show', $faktura->id) }}">Prikaži</a>

                                    <a class="btn btn-sm btn-outline-warning"
                                       href="{{ route('fakturas.edit', $faktura->id) }}">Izmeni</a>

                                    <form class="d-inline"
                                          method="POST"
                                          action="{{ route('fakturas.destroy', $faktura->id) }}"
                                          onsubmit="return confirm('Obrisati fakturu?');">
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
        <div class="alert alert-info">Nema unetih faktura.</div>
    @endif
</div>
@endsection
