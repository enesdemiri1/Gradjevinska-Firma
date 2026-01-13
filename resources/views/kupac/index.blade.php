{{-- resources/views/kupac/index.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Kupci</h2>
        <a href="{{ route('kupacs.create') }}" class="btn btn-primary">+ Dodaj kupca</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(!empty($kupacs) && count($kupacs) > 0)
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th style="width:80px;">ID</th>
                            <th>Ime</th>
                            <th>Kontakt</th>
                            <th class="text-end" style="width:260px;">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kupacs as $kupac)
                            <tr>
                                <td>{{ $kupac->id }}</td>
                                <td>{{ $kupac->ime }}</td>
                                <td>{{ $kupac->kontakt }}</td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-secondary"
                                       href="{{ route('kupacs.show', $kupac->id) }}">Prikaži</a>

                                    <a class="btn btn-sm btn-outline-warning"
                                       href="{{ route('kupacs.edit', $kupac->id) }}">Izmeni</a>

                                    <form class="d-inline"
                                          method="POST"
                                          action="{{ route('kupacs.destroy', $kupac->id) }}"
                                          onsubmit="return confirm('Obrisati kupca?');">
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
        <div class="alert alert-info">Nema unetih kupaca.</div>
    @endif

</div>
@endsection
