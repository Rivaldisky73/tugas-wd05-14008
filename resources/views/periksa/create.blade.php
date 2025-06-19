@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Periksa Pasien</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
    @endif

    <form action="{{ route('periksa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pasien</label>
            <select name="pasien_id" class="form-control" required>
                <option value="">-- Pilih Pasien --</option>
                @foreach($pasiens as $pasien)
                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Dokter</label>
            <select name="dokter_id" class="form-control" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach($dokters as $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Periksa</label>
            <input type="date" name="tanggal_periksa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Jam Periksa</label>
            <input type="time" name="jam_periksa" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Diagnosa</label>
            <textarea name="diagnosa" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Biaya Periksa</label>
            <input type="number" name="biaya_periksa" class="form-control" min="0" required>
        </div>

        <h5>Resep Obat</h5>
        <div id="obat-list">
            <div class="row obat-item mb-2">
                <div class="col-md-8">
                    <select name="obat_ids[]" class="form-control" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach($obats as $obat)
                        <option value="{{ $obat->id }}">{{ $obat->nama }} ({{ $obat->kemasan }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="number" name="jumlah[]" class="form-control" value="1" min="1" required>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger btn-remove-obat">X</button>
                </div>
            </div>
        </div>

        <button type="button" id="btn-tambah-obat" class="btn btn-primary mb-3">Tambah Obat</button>

        <button type="submit" class="btn btn-success">Simpan Pemeriksaan</button>
    </form>
</div>

<script>
    document.getElementById('btn-tambah-obat').addEventListener('click', function() {
        const obatList = document.getElementById('obat-list');
        const newObat = document.querySelector('.obat-item').cloneNode(true);
        newObat.querySelector('select').value = '';
        newObat.querySelector('input').value = 1;
        obatList.appendChild(newObat);

        // Tambah event remove
        newObat.querySelector('.btn-remove-obat').addEventListener('click', function() {
            this.closest('.obat-item').remove();
        });
    });

    // Event remove obat awal
    document.querySelectorAll('.btn-remove-obat').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.obat-item').remove();
        });
    });
</script>
@endsection
