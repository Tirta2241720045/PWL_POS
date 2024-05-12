<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $request->validate([
            'berkas' => 'required|file|image|max:5000',
            'nama_file' => 'required|string'
        ]);

        $namaFile = $request->input('nama_file') . '-' . time() . '.' . $request->berkas->getClientOriginalExtension();

        $path = $request->berkas->move('gambar', $namaFile);
        $path = str_replace("\\", "//", $path);

        $pathBaru = asset('gambar/' . $namaFile);

        // Menampilkan pesan sukses dan link gambar
        echo "Gambar berhasil diupload ke <a href='$pathBaru'>$namaFile</a><br>";

        // Menampilkan gambar yang diunggah
        echo "<img src='$pathBaru' alt='uploaded_image'>";
    }
}
