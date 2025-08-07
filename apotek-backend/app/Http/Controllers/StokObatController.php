<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StokObat;
use Illuminate\Http\Request;

class StokObatController extends Controller
{
    public function index()
    {
        return response()->json(StokObat::with(['obat', 'supplier'])->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'nullable|date',
            'supplier_id' => 'nullable|exists:suppliers,id'
        ]);

        $stok = StokObat::create($request->all());

        return response()->json(['message' => 'Stok obat berhasil ditambahkan', 'data' => $stok], 201);
    }

    public function show($id)
    {
        $stok = StokObat::with(['obat', 'supplier'])->findOrFail($id);
        return response()->json($stok);
    }

    public function update(Request $request, $id)
    {
        $stok = StokObat::findOrFail($id);

        $request->validate([
            'obat_id' => 'required|exists:obats,id',
            'jumlah' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'tanggal_kadaluarsa' => 'nullable|date',
            'supplier_id' => 'nullable|exists:suppliers,id'
        ]);

        $stok->update($request->all());

        return response()->json(['message' => 'Stok obat berhasil diupdate', 'data' => $stok]);
    }

    public function destroy($id)
    {
        $stok = StokObat::findOrFail($id);
        $stok->delete();

        return response()->json(['message' => 'Stok obat berhasil dihapus']);
    }
}
