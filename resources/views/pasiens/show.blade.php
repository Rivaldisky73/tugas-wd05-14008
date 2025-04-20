@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detail Pasien</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pasiens.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Pasien</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>Nama:</strong>
                        {{ $pasien->nama }}
                    </div>
                    <div class="form-group">
                        <strong>Jenis Kelamin:</strong>
                        {{ $pasien->jenis_kelamin }}
                    </div>
                    <div class="form-group">
                        <strong>No HP:</strong>
                        {{ $pasien->no_hp }}
                    </div>
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        {{ $pasien->alamat }}
                    </div>
                    <div class="form-group">
                        <strong>Tanggal Lahir:</strong>
                        {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d F Y') }}
                    </div>
                    <div class="form-group">
                        <strong>Umur:</strong>
                        {{ $pasien->umur }} tahun
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Riwayat Pemeriksaan</h4>
                </div>
                <div class="card-body">
                    @if($pasien->periksas->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Dokter</th>
                                    <th>Diagnosa</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pasien->periksas as $periksa)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($periksa->tanggal_periksa)->format('d/m/Y') }}</td>
                                    <td>{{ $periksa->dokter->nama }}</td>
                                    <td>{{ $periksa->diagnosa }}</td>
                                    <td>
                                        <a href="{{ route('periksas.show', $periksa->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Belum ada riwayat pemeriksaan.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
