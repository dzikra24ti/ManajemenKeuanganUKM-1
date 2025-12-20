@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
<div class="container">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Daftar Transaksi</h4>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
            + Tambah Transaksi
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Card Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
           <table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Nominal</th>
            <th>Bukti</th> <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
  @foreach($transaksi as $t)
<tr>
    <td>{{ $t->tanggal }}</td>
    <td>{{ $t->kategori }}</td>
    <td>{{ $t->keterangan }}</td>
    <td>Rp {{ number_format($t->jumlah) }}</td>
    <td>
        @if($t->bukti_pembayaran)
            <img src="{{ asset('uploads/bukti/' . $t->bukti_pembayaran) }}" width="50" class="rounded">
        @endif
    </td>

    <td>
        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('transaksi.edit', $t->id) }}" class="btn btn-warning btn-sm text-white flex-shrink-0">
                <i class="fas fa-edit"></i> Edit
            </a>

            <form action="{{ route('transaksi.destroy', $t->id) }}" method="POST" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm flex-shrink-0" onclick="return confirm('Yakin ingin menghapus?')">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </form>
        </div>
    </td>
</tr>
@endforeach
    </tbody>
</table>
        </div>
    </div>

</div>
@endsection
