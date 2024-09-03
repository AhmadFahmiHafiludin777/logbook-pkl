<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    function tampil() {
        $angkatan = Angkatan::get();
        return view('angkatan.tampil', compact('angkatan'), ['title' => 'Angkatan Page']);
    }

    function tambah() {
        return view('angkatan.tambah', ['title' => 'Tambah Page']);
    }

    function submit(Request $request){
        $angkatan = new Angkatan();
        $angkatan->tahun = $request->tahun;
        $angkatan->save();

        return redirect()->route('angkatan.tampil');
    }

    function edit($id) {
        $angkatan = Angkatan::find($id);
        return view('angkatan.edit', compact('angkatan'), ['title' => 'Edit Page']);
    }

    function update(Request $request, $id){
        $angkatan = Angkatan::find($id);
        $angkatan->tahun = $request->tahun;
        $angkatan->update();

        return redirect()->route('angkatan.tampil');
    }

    function delete($id) {
        $angkatan = Angkatan::find($id);
        $angkatan->delete();

        return redirect()->route('angkatan.tampil');
    }
}
