@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<div class="container">
    <h4 class="mb-3">Tambah Transaksi</h4>

   <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control"
                   value="{{ old('tanggal') }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Transaksi</label>
            <select name="jenis" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="masuk">Pemasukan</option>
                <option value="keluar">Pengeluaran</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <input type="text" name="kategori" class="form-control"
                   value="{{ old('kategori') }}" required>
        </div>

        <div class="mb-3">
            <label>Nominal</label>
            <input type="text" name="Nominal" class="form-control"
                   value="{{ old('Nominal') }}" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
        </div>
        <div class="mb-3">
    <label for="bukti_pembayaran" class="form-label text-white">Bukti Pembayaran</label>
    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control @error('bukti_pembayaran') is-invalid @enderror">
    
    @error('bukti_pembayaran')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    <small class="text-muted">Format: JPG, PNG, JPEG (Maks. 2MB)</small>
</div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
