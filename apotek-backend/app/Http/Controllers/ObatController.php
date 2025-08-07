<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // GET /api/obat
    public function index()
    {
        return response()->json(Obat::all());
    }

    // POST /api/obat
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'nullable|string',
            'satuan' => 'nullable|string',
            'harga' => 'required|numeric',
            'minimal_stok' => 'nullable|integer',
        ]);

        $obat = Obat::create($request->all());

        return response()->json(['message' => 'Obat berhasil ditambahkan', 'data' => $obat], 201);
    }

    // GET /api/obat/{id}
    public function show($id)
    {
        $obat = Obat::findOrFail($id);
        return response()->json($obat);
    }

    // PUT /api/obat/{id}
    public function update(Request $request, $id)
    {
        $obat = Obat::findOrFail($id);

        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'nullable|string',
            'satuan' => 'nullable|string',
            'harga' => 'required|numeric',
            'minimal_stok' => 'nullable|integer',
        ]);

        $obat->update($request->all());

        return response()->json(['message' => 'Obat berhasil diupdate', 'data' => $obat]);
    }

    // DELETE /api/obat/{id}
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return response()->json(['message' => 'Obat berhasil dihapus']);
    }
}
