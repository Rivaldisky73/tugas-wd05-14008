@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Manajemen Pasien</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('pasiens.create') }}">Tambah Pasien Baru</a>
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
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No HP</th>
            <th>Umur</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pasiens as $pasien)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pasien->nama }}</td>
            <td>{{ $pasien->jenis_kelamin }}</td>
            <td>{{ $pasien->no_hp }}</td>
            <td>{{ $pasien->umur }} tahun</td>
            <td>
                <form action="{{ route('pasiens.destroy',$pasien->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('pasiens.show',$pasien->id) }}">Detail</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('pasiens.edit',$pasien->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $pasiens->links() !!}
</div>
@endsection
