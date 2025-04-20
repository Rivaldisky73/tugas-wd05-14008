@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Pasien Anda</h3>
    <ul>
        @forelse($patients as $p) <!-- Make sure to use $patients -->
            <li>{{ $p->name }} - {{ $p->email }}</li>
        @empty
            <li>Belum ada pasien</li>
        @endforelse
    </ul>
</div>
@endsection
