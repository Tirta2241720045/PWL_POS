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
            'berkas' => 'required|file|image|max:5000',]);
            $extfile = $request->berkas->getClientOriginalName();
            $namaFile = 'web-'.time().".".$extfile;
            $path = $request->berkas->storeAs('public', $namaFile);
            echo "proses upload berhasil, file berada di: $path";

            $pathBaru=asset('storage/'.$namaFile);
            echo "proses upload berhasil, data disimpan pada:$path";
            echo "<br>";
            echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";
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