<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(KategoriModel::all(), 200);
    }

    public function store(Request $request)
    {
        $kategori = KategoriModel::create($request->all());
        return response()->json($kategori, 201);
    }

    public function show(KategoriModel $kategori)
    {
        return response()->json($kategori, 200);
    }
    public function update(Request $request, $kategori)
    {
        $kategori = KategoriModel::find($kategori);
        $kategori->update($request->all());
        return response()->json($kategori, 200);
    }

    public function destroy($kategori)
    {
        KategoriModel::destroy($kategori);
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
