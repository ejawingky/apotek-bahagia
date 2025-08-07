<?php 

// app/Http/Controllers/Api/ResepDetailController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ResepDetail;

class ResepDetailController extends Controller
{
    public function index()
    {
        return response()->json(ResepDetail::with(['resep', 'obat'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'resep_id' => 'required|exists:reseps,id',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
            'aturan_pakai' => 'nullable|string',
        ]);

        $detail = ResepDetail::create($request->all());

        return response()->json(['message' => 'Detail resep berhasil ditambahkan', 'data' => $detail], 201);
    }

    public function show($id)
    {
        $detail = ResepDetail::with(['resep', 'obat'])->findOrFail($id);
        return response()->json($detail);
    }

    public function update(Request $request, $id)
    {
        $detail = ResepDetail::findOrFail($id);

        $request->validate([
            'resep_id' => 'required|exists:reseps,id',
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer|min:1',
            'aturan_pakai' => 'nullable|string',
        ]);

        $detail->update($request->all());

        return response()->json(['message' => 'Detail resep berhasil diperbarui', 'data' => $detail]);
    }

    public function destroy($id)
    {
        $detail = ResepDetail::findOrFail($id);
        $detail->delete();

        return response()->json(['message' => 'Detail resep berhasil dihapus']);
    }
}
