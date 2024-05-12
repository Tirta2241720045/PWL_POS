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
            'nama_file' => 'required|string']);
            // $extfile = $request->berkas->getClientOriginalName();
            // $namaFile = 'web-'.time().".".$extfile;
            $namaFile = $request->input('nama_file') . '-' . time() . '.' . $request->berkas->getClientOriginalExtension();

            $path = $request->berkas->move('gambar', $namaFile);
            $path =str_replace("\\","//", $path);
            // echo "Variabel path berisi: $path <br>";

            $pathBaru=asset('gambar/'.$namaFile);
            echo "Gambar berhasil diupload ke <a href='$pathBaru'>$namaFile</a><br>";
            echo "<br>";
            echo "<img src='$pathBaru' alt='uploaded_image'>";
                        // $path = $request->berkas->store('uploads');
            // echo $request->berkas->getClientOriginalName()."lolos validasi";
        // dump($request->berkas);
        // dump($request->file('file'));
        // return "Pemrorsesan file upload di sini";
        // if($request->hasFile('berkas')){
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".
        //     $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".
        //     $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // } else {
        //     echo "Tidak ada file yang diupload";
        // }
    }
}