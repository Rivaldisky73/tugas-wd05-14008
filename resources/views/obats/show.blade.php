{{-- resources/views/obats/show.blade.php --}}
@extends('layouts.adminlte')

@section('title', 'Detail Obat')

@section('content_header')
  <h1>Detail Obat</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ $obat->nama }}</h3>
    </div>
    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">Nama Obat</dt>
        <dd class="col-sm-9">{{ $obat->nama }}</dd>

        <dt class="col-sm-3">Harga</dt>
        <dd class="col-sm-9">@currency($obat->harga)</dd>
      </dl>
    </div>
    <div class="card-footer">
      <a href="{{ route('obats.index') }}" class="btn btn-default">Kembali</a>
      <a href="{{ route('obats.edit', $obat->id) }}" class="btn btn-primary">Ubah</a>
    </div>
  </div>
@endsection
