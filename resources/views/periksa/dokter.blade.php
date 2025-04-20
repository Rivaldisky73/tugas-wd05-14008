<!-- resources/views/periksa/dokter.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Dokter</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>No HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->spesialis }}</td>
                <td>{{ $dokter->no_hp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
