<?php 

// app/Http/Controllers/Api/TransaksiDetailController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        return response()->json(TransaksiDetail::with(['transaksi', 'obat'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
        ]);

        $subtotal = $request->jumlah * $request->harga_satuan;

        $detail = TransaksiDetail::create([
            'transaksi_id' => $request->transaksi_id,
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'subtotal' => $subtotal,
        ]);

        return response()->json(['message' => 'Detail transaksi ditambahkan', 'data' => $detail], 201);
    }

    public function show($id)
    {
        $detail = TransaksiDetail::with(['transaksi', 'obat'])->findOrFail($id);
        return response()->json($detail);
    }

    public function update(Request $request, $id)
    {
        $detail = TransaksiDetail::findOrFail($id);

        $request->validate([
            'transaksi_id' => 'required|exists:transaksis,id',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|integer|min:0',
        ]);

        $subtotal = $request->jumlah * $request->harga_satuan;

        $detail->update([
            'transaksi_id' => $request->transaksi_id,
            'obat_id' => $request->obat_id,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'subtotal' => $subtotal,
        ]);

        return response()->json(['message' => 'Detail transaksi diperbarui', 'data' => $detail]);
    }

    public function destroy($id)
    {
        $detail = TransaksiDetail::findOrFail($id);
        $detail->delete();

        return response()->json(['message' => 'Detail transaksi dihapus']);
    }
}
