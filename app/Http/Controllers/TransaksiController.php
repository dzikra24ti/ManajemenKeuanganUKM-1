<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;


class TransaksiController extends Controller
{
    public function index()
{
    $transaksi = Transaksi::latest()->get();

    // SESUAIKAN DENGAN FOLDER VIEW
    return view('admin.transaksi.index', compact('transaksi'));
}


    public function create()
    {
        return view('admin.transaksi.create');
    }

 public function store(Request $request)
{
    $validated = $request->validate([
        'tanggal' => 'required',
        'jenis' => 'required',
        'kategori' => 'required',
        'jumlah' => 'required|numeric',
        'keterangan' => 'required',
        'bukti_pembayaran' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('bukti_pembayaran')) {
        $file = $request->file('bukti_pembayaran');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('uploads/bukti'), $nama_file);
        $validated['bukti_pembayaran'] = $nama_file; // Masukkan nama file ke data validasi
    }

    // Gunakan $validated untuk keamanan
    Transaksi::create($validated); 

    return redirect()->route('transaksi.index')
        ->with('success', 'Transaksi berhasil disimpan!');
}

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis'   => 'required|in:masuk,keluar',
            'kategori'=> 'required|string|max:100',
            'jumlah'  => 'required|numeric|min:0',
        ]);

        $transaksi->update([
            'tanggal'    => $request->tanggal,
            'jenis'      => $request->jenis,
            'kategori'   => $request->kategori,
            'jumlah'     => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil diperbarui');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}

