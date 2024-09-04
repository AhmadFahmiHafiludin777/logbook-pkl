<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    function tampil() {
        $sekolah = Sekolah::get();
        return view('sekolah.tampil', compact('sekolah'), ['title' => 'Sekolah Page']);
    }

    function tambah() {
        return view('sekolah.tambah', ['title' => 'Tambah Page']);
    }

    function submit(Request $request){
        $sekolah = new Sekolah();
        $sekolah->nama = $request->nama;
        $sekolah->email = $request->email;
        $sekolah->no_telp = $request->no_telp;
        $sekolah->alamat = $request->alamat;
        $sekolah->save();

        return redirect()->route('sekolah.tampil');
    }

    function edit($id) {
        $sekolah = Sekolah::find($id);
        return view('sekolah.edit', compact('sekolah'), ['title' => 'Edit Page']);
    }

    function update(Request $request, $id){
        $sekolah = Sekolah::find($id);
        $sekolah->nama = $request->nama;
        $sekolah->email = $request->email;
        $sekolah->no_telp = $request->no_telp;
        $sekolah->alamat = $request->alamat;
        $sekolah->update();

        return redirect()->route('sekolah.tampil');
    }

    function delete($id) {
        $sekolah = Sekolah::find($id);
        $sekolah->delete();

        return redirect()->route('sekolah.tampil');
    }
}
