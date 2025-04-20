<!-- resources/views/periksa/pasien.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pasien</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $pasien)
            <tr>
                <td>{{ $pasien->nama }}</td>
                <td>{{ $pasien->jenis_kelamin }}</td>
                <td>{{ $pasien->no_hp }}</td>
                <td>{{ $pasien->alamat }}</td>
                <td>{{ $pasien->tanggal_lahir }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
