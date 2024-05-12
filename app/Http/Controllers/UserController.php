<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;



class UserController extends Controller
{
    //menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdafatar dalam sistem'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        $level = LevelModel::all(); //ambil data level untuk filter level user

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables 
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')->with('level');

        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() //menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) {
                $detailBtn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-primary" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-info-circle"></i></a>';
                $editBtn = '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning" style="width: 40px; height: 40px; margin-right: 5px;"><i class="fas fa-edit"></i></a>';
                $deleteBtn = '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger" style="width: 40px; height: 40px;" onclick="return confirm(\'Apakah Anda Yakin Menghapus Data Ini ? \');"><i class="fas fa-trash-alt"></i></button></form>';
                return $detailBtn . $editBtn . $deleteBtn;
            })
            ->rawColumns(['aksi']) //memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    //menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah User Baru'
        ];

        $level = LevelModel::all(); //ambil data level untuk ditampilkan di form tambah user
        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    // menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama' => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
            'berkas' => 'required|file|image|max:5000', // tambahkan validasi untuk file
        ]);
    
        // Simpan file yang diunggah ke dalam storage atau direktori yang diinginkan
        $namaFile = 'web-' . time() . '.' . $request->berkas->getClientOriginalName();
        $path = $request->berkas->storeAs('user', $namaFile);
        $path = 'user/' . $request->nama . '/' . $namaFile;
    
        // Simpan path file ke dalam kolom image di database
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $path, // Simpan path file ke dalam kolom image
        ]);
    
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }
    
    //menampilkan detail user
    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail User',
        ];

        $activeMenu = 'User'; //set menu yang sedang aktif

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);

    }

    //Menampilkan halaman form edit user
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit user'
        ];

        $activeMenu = 'user'; //set menu yang sedang aktif

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    //Menyimpan perubahan data user
    public function update(Request $request, string $id)
    {
        $request->validate([
            // username harus diisi, berupa string, minimal 3 karakter, 
            // dan bernilai unik di tabel m_user kolom username kecuali user_id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama' => 'required|string|max:100',    // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5',         // password bisa diisi (minimal 5 karakter) atau bisa tidak diisi
            'level_id' => 'required|integer',        // level_id harus diisi dan berupa angka
            'berkas' => 'required|file|image|max:5000' // tambahkan validasi untuk file

        ]);
    
        // Dapatkan data user yang akan diubah
        $user = UserModel::find($id);
    
        // Perbarui path dalam database jika ada file baru yang diunggah
        if ($request->hasFile('berkas')) {
            $request->validate([
                'berkas' => 'file|image|max:5000', // tambahkan validasi untuk file
            ]);
    
            // Simpan file yang diunggah ke dalam storage atau direktori yang diinginkan
            $namaFile = 'web-' . time() . '.' . $request->file('berkas')->getClientOriginalName();
            $path = $request->file('berkas')->storeAs('user', $namaFile);
            $path = 'user/' . $request->nama . '/' . $namaFile;
    
            // Perbarui path file ke dalam database
            $user->update([
                'image' => $path,
            ]);
        }
    
        // Perbarui data user dengan data yang diterima dari form
        $user->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'level_id' => $request->level_id
        ]);
    
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }
    
    

    //Menghapus data user
    public function destroy(string $id)
    {
        $check = UserModel::find($id);

        if (!$check) { //untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id); //Hapus data level
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data user, redirect kembali dengan membawa pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }

    // public function index()
    // {
    //     $user = UserModel::with('level')->get();
    //     return view('user', ['data' => $user]);
    //     // dd($user);
    // }
    public function tambah(){
        return view('user_tambah');
    }
    public function tambahForm(){
        return view('user_tambah');
    }
    public function tambah_simpan(StorePostRequest $request):RedirectResponse{
        // UserModel::create([
        //     'username' => $request->username,
        //     'nama' => $request->nama,
        //     'password' => Hash::make('$request->password'),
        //     'level_id' => $request->level_id
        // ]);
        $validated = $request->validated();
        
        $validated = $request->safe()->only(['username', 'nama', 'password', 'level_id']);
        $validated = $request->safe()->except(['username', 'nama', 'password', 'level_id']);

        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);    
    }
    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }
    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        
        return redirect('/user');
    }
        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged(); //true
        // $user->wasChanged('username'); //true
        // $user->wasChanged(['username', 'level_id']); //true
        // $user->wasChanged('nama'); //false
        // dd($user->wasChanged(['nama', 'username'])); //true

        // return view('user', ['data' => $user]);
        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty(['nama','username']); //true

        // $user->isClean(); //false
        // $user->isClean('username'); //false 
        // $user->isClean('nama'); //true
        // $user->isClean(['nama','username']); //false

        // $user->save();

        // $user->isDirty(); //false
        // $user->isClean(); //true
        // dd($user->isDirty()); 

        //tambah data user dengan Eloquent Model
        // $data = [
        //     'level_id' => 2,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345')
        // ];
        // UserModel::create($data); //update data user
        //coba akses model UserModel
}