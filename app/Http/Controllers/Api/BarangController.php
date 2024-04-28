<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(BarangModel::all(), 200);
    }

    public function store(Request $request)
    {
        $barang = BarangModel::create($request->all());
        return response()->json($barang, 201);
    }

    public function show($barang)
    {
        return response()->json(BarangModel::find($barang), 200);
    }

    public function update(Request $request, $barang)
    {
        $barang = BarangModel::find($barang);
        $barang->update($request->all());
        return response()->json($barang, 200);
    }

    public function destroy($barang)
    {
        BarangModel::destroy($barang);
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
