<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    function tampil() {
        $angkatan = Angkatan::get();
        return view('angkatan.tampil', compact('angkatan'));
    }

    function tambah() {
        return view('angkatan.tambah');
    }

    function submit(Request $request){
        $angkatan = new Angkatan();
        $angkatan->tahun = $request->tahun;
        $angkatan->save();

        return redirect()->route('angkatan.tampil');
    }
}
