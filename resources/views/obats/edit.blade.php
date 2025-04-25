{{-- resources/views/obats/edit.blade.php --}}
@extends('layouts.adminlte')  {{-- or whatever your master layout is --}}

@section('title', 'Edit Obat')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit Obat</h3>
  </div>
  <div class="card-body">
    <form action="{{ route('obats.update', $obat->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="nama">Nama Obat</label>
        <input
          type="text"
          name="nama"
          id="nama"
          class="form-control"
          value="{{ old('nama', $obat->nama) }}"
        >
      </div>

      <div class="form-group">
        <label for="harga">Harga</label>
        <input
          type="number"
          name="harga"
          id="harga"
          class="form-control"
          value="{{ old('harga', $obat->harga) }}"
        >
      </div>

      <button type="submit" class="btn btn-primary">Update</button>
      <a href="{{ route('obats.index') }}" class="btn btn-default">Cancel</a>
    </form>
  </div>
</div>
@endsection
