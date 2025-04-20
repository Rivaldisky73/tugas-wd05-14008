@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Pasien</h1>

    <div class="row">
        <!-- Jumlah Riwayat Periksa -->
        <div class="col-md-3">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h2>{{ \App\Models\Periksa::count() }}</h2>
                    <p>Jumlah Riwayat Periksa</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">More info</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Bounce Rate -->
        <div class="col-md-3">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h2>53%</h2>
                    <p>Bounce Rate</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">More info</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- User Registrations -->
        <div class="col-md-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <h2>{{ \App\Models\User::count() }}</h2>
                    <p>User Registrations</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">More info</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <!-- Unique Visitors -->
        <div class="col-md-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h2>65</h2>
                    <p>Unique Visitors</p>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">More info</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Periksas -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Riwayat Periksa Terbaru
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Tanggal</th>
                            <th>Diagnosa</th>
                            <th>Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Models\Periksa::with(['pasien', 'dokter'])->latest()->take(5)->get() as $periksa)
                        <tr>
                            <td>{{ $periksa->id }}</td>
                            <td>{{ $periksa->pasien->nama }}</td>
                            <td>{{ $periksa->dokter->nama }}</td>
                            <td>{{ $periksa->tanggal_periksa }}</td>
                            <td>{{ $periksa->diagnosa }}</td>
                            <td>Rp {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
