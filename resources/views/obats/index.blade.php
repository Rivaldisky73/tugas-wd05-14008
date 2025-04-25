@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manajemen Obat</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('obats.create') }}">Tambah Obat Baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Kemasan</th>
            <th>Harga</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($obats as $obat)
        <tr>
            
            <td>{{ $obat->nama_obat }}</td>
            <td>{{ $obat->kemasan }}</td>
            <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('obats.destroy',$obat->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('obats.show',$obat->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('obats.edit',$obat->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $obats->links() !!}
</div>
@endsection
