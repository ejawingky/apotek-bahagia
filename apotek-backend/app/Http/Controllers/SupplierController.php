<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Ambil semua supplier
    public function index()
    {
        return response()->json(Supplier::all(), 200);
    }

    // Simpan supplier baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email'
        ]);

        $supplier = Supplier::create($validated);

        return response()->json($supplier, 201);
    }

    // Tampilkan detail supplier
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json($supplier, 200);
    }

    // Update supplier
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $validated = $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'nullable|string',
            'no_telp' => 'nullable|string|max:20',
            'email' => 'nullable|email'
        ]);

        $supplier->update($validated);

        return response()->json($supplier, 200);
    }

    // Hapus supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json(null, 204);
    }
}
