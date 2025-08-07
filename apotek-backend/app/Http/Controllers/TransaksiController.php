<?php 

// app/Http/Controllers/Api/TransaksiController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return response()->json(Transaksi::with('pasien')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tanggal' => 'required|date',
            'total_harga' => 'required|integer|min:0',
            'metode_bayar' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $transaksi = Transaksi::create($request->all());

        return response()->json(['message' => 'Transaksi berhasil ditambahkan', 'data' => $transaksi], 201);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('pasien')->findOrFail($id);
        return response()->json($transaksi);
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'tanggal' => 'required|date',
            'total_harga' => 'required|integer|min:0',
            'metode_bayar' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $transaksi->update($request->all());

        return response()->json(['message' => 'Transaksi berhasil diperbarui', 'data' => $transaksi]);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return response()->json(['message' => 'Transaksi berhasil dihapus']);
    }
}
