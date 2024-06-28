<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    //
    public function fileUpload(){
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request){
        // dump($request->berkas);
        $request->validate(['berkas' => 'required|file|image|max:5000',]);
        $extfile = $request->berkas->getClientOriginalname();
        $namaFile = 'web'.time().".".$extfile;
        
        $path = $request->berkas->move('gambar',$namaFile);
        $path = str_replace("\\","//", $path);
        echo"Variabel path berisi: $path <br>";

        $pathBaru=asset('gambar/'.$namaFile);
        echo"proses upload berhasil, data dismpan pada:$path";
        echo"<br>";
        echo"Tampilkan link:<a href='$pathBaru'>$pathBaru</a>";
    }
}
