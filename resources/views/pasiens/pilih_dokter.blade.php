@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pilih Dokter</h3>
    <form action="{{ route('pasien.simpan_pilihan') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="dokter_id">Pilih Dokter</label>
            <select name="dokter_id" id="dokter_id" class="form-control">
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection
