<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(BarangModel::all(), 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required',
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'image' => 'required',
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $barang = BarangModel::create($request->all());

        //return response JSON user is created
        if($barang) {
            return response()->json([
                'success' => true,
                'data' => $barang,
            ], 201);
        }
        
    }

    public function show(BarangModel $barang,)
    {
        return response()->json($barang, 200);
        
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
