<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{


    public function show($id)
    {
        $penjualan = PenjualanModel::with('user')->findOrFail($id);
        $barang = $penjualan->detail()->with('barang')->get();
        $penjualan->barang = $barang;
        return response()->json($penjualan, 200);
    }
}
// public function index()
// {
//     $penjualans = PenjualanModel::all();
//     return response()->json($penjualans, 200);
// }

// public function store(Request $request)
// {
//     $validator = Validator::make($request->all(), [
//         'penjualan_kode' => 'required|string|min:5|unique:t_penjualan,penjualan_kode',
//         'user_id' => 'required|integer',
//         'pembeli' => 'required|string|max:100',
//         'penjualan_tanggal' => 'required|date',
//     ]);

//     if ($validator->fails()) {
//         return response()->json($validator->errors(), 422);
//     }

//     $penjualan = PenjualanModel::create($request->all());

//     return response()->json($penjualan, 201);
// }

// public function show($id)
// {
//     $penjualan = PenjualanModel::with('user')->findOrFail($id);
//     return response()->json($penjualan, 200);
// }

// public function update(Request $request, $id)
// {
//     $validator = Validator::make($request->all(), [
//         'penjualan_kode' => 'nullable|string|min:5|unique:t_penjualan,penjualan_kode,' . $id . ',penjualan_id',
//         'user_id' => 'required|integer',
//         'pembeli' => 'required|string|max:100',
//         'penjualan_tanggal' => 'required|date',
//     ]);

//     if ($validator->fails()) {
//         return response()->json($validator->errors(), 422);
//     }

//     $penjualan = PenjualanModel::findOrFail($id);
//     $penjualan->update($request->all());

//     return response()->json($penjualan, 200);
// }

// public function destroy($id)
// {
//     $penjualan = PenjualanModel::findOrFail($id);
//     $penjualan->delete();

//     return response()->json([
//         'success' => true,
//         'message' => 'Penjualan record deleted successfully.'
//     ], 200);
// }