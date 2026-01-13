{{-- resources/views/dobavljac/index.blade.php --}}
@extends('layouts.public')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Dobavljači</h2>
        <a href="{{ route('dobavljacs.create') }}" class="btn btn-primary">+ Dodaj dobavljača</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(!empty($dobavljacs) && count($dobavljacs) > 0)
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped mb-0 align-middle">
                    <thead>
                        <tr>
                            <th style="width:80px;">ID</th>
                            <th>Naziv</th>
                            <th>Adresa</th>
                            <th class="text-end" style="width:260px;">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dobavljacs as $dobavljac)
                            <tr>
                                <td>{{ $dobavljac->id }}</td>
                                <td>{{ $dobavljac->naziv }}</td>
                                <td>{{ $dobavljac->adresa }}</td>
                                <td class="text-end">
                                    <a class="btn btn-sm btn-outline-secondary"
                                       href="{{ route('dobavljacs.show', $dobavljac->id) }}">Prikaži</a>

                                    <a class="btn btn-sm btn-outline-warning"
                                       href="{{ route('dobavljacs.edit', $dobavljac->id) }}">Izmeni</a>

                                    <form class="d-inline"
                                          method="POST"
                                          action="{{ route('dobavljacs.destroy', $dobavljac->id) }}"
                                          onsubmit="return confirm('Obrisati dobavljača?');">
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
        <div class="alert alert-info">Nema unetih dobavljača.</div>
    @endif

</div>
@endsection
