@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h3>Manajemen Obat</h3>
<a href="{{ route('obats.create') }}" class="btn btn-primary mb-2">+ Tambah Obat</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Obat</th>
            <th>Kemasan</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($obats as $index => $obat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $obat->nama }}</td>
                <td>{{ $obat->kemasan }}</td>
                <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('obats.edit', $obat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('obats.destroy', $obat->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Tidak ada data obat.</td></tr>
        @endforelse
    </tbody>
</table>
