<?php 

// app/Http/Controllers/Api/PasienController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    public function index()
    {
        return response()->json(Pasien::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $pasien = Pasien::create($request->all());

        return response()->json(['message' => 'Pasien berhasil ditambahkan', 'data' => $pasien], 201);
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return response()->json($pasien);
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
        ]);

        $pasien->update($request->all());

        return response()->json(['message' => 'Pasien berhasil diupdate', 'data' => $pasien]);
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return response()->json(['message' => 'Pasien berhasil dihapus']);
    }
}
