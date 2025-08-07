<?php 

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;

class ResepController extends Controller
{
    public function index()
    {
        return response()->json(Resep::with('pasien')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $resep = Resep::create($request->all());

        return response()->json(['message' => 'Resep berhasil dibuat', 'data' => $resep], 201);
    }

    public function show($id)
    {
        $resep = Resep::with('pasien')->findOrFail($id);
        return response()->json($resep);
    }

    public function update(Request $request, $id)
    {
        $resep = Resep::findOrFail($id);

        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $resep->update($request->all());

        return response()->json(['message' => 'Resep berhasil diupdate', 'data' => $resep]);
    }

    public function destroy($id)
    {
        $resep = Resep::findOrFail($id);
        $resep->delete();

        return response()->json(['message' => 'Resep berhasil dihapus']);
    }
}
