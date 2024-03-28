<?php

namespace App\Http\Controllers;
use App\Models\KategoriModel;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
// use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable){
        return $dataTable->render('kategori.index');
    }

    // public function create(){
    //     return view('kategori.create');
    // }
    // public function create(): View{
    //     return view('kategori.create');
    // }
    // public function store(Request $request){
    //     KategoriModel::create([
    //         'kategori_kode' => $request->kodeKategori,
    //         'kategori_nama' => $request->namaKategori
    //     ]);
    //     return redirect('/kategori');
    // }
        public function create(): View{
        return view('kategori.create');
    }
    // public function store(Request $request):RedirectResponse{
    //     $validated = $request->validate([
    //         'kategori_kode' => 'bail|required|unique:m_kategori|max:5',
    //         'kategori_nama' => 'bail|required|unique:m_kategori',
    //     ]);

    //     KategoriModel::create([
    //         'kategori_kode' => $request->kategori_kode,
    //         'kategori_nama' => $request->namaKategori
    //     ]);

    //     return redirect('/kategori');
    // }
    
    public function store(StorePostRequest $request):RedirectResponse{
        $validated = $request->validated();
        
        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);


        return redirect('/kategori');
    }
    
    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update($id, Request $request)
    {
        $kategori = KategoriModel::find($id);
        if (!$kategori) {
            return redirect()->back()->with('error', 'Kategori tidak ditemukan.');
        }

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;
        $kategori->save();

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }


    public function destroy($id)
    {
        KategoriModel::destroy($id);
        return redirect('/kategori');
    }
    
}
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row.' baris';

        // $row = DB::table('m_kategori') ->where ('kategori_kode', 'SNK')->delete();
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row. ' baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);

