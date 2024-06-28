<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class fileUploadV2 extends Controller
{
    //
    public function fileUpload(){
        return view('file-upload-v2');
    }

    public function prosesFileUpload(Request $request){
        // dump($request->berkas);
        $request->validate(['berkas' => 'required|file|image|max:5000',]);
        $namaFile = $request->filename;
        
        $path = $request->berkas->move('gambar',$namaFile);
        $path = str_replace("\\","//", $path);

        $pathBaru=asset('gambar/'.$namaFile);
        echo"Gambar berhasil di upload ke <a href='$pathBaru'>$namaFile</a>";
        echo"<br>";
        echo"<img src='$path' style='height:150px; width:150px;'>";
    }
}
