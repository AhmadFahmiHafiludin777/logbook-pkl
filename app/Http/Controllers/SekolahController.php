<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index() {
        $sekolah = Sekolah::paginate(3);
        return view('sekolah.index', compact('sekolah'), ['title' => 'Sekolah Page']);
    }

    public function create() {
        return view('sekolah.create', ['title' => 'Tambah Page']);
    }

    public function store(Request $request){

        Sekolah::create($request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'no_telp' => ['nullable', 'string' , 'max:20'],
            'alamat' => ['nullable', 'string', 'max:255'],
        ]));

        return redirect()->route('sekolah.index');
    }

    public function show($id) {
        $sekolah = Sekolah::findOrFail($id);
        return view('sekolah.show', compact('sekolah'), ['title' => 'Show Page']);
    }

    public function edit($id) {
        $sekolah = Sekolah::findOrFail($id);
        return view('sekolah.edit', compact('sekolah'), ['title' => 'Edit Page']);
    }

    public function update(Request $request, $id){

        Sekolah::findOrFail($id)->update(
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'no_telp' => ['nullable', 'string' , 'max:20'],
                'alamat' => ['nullable', 'string', 'max:255'],
            ])
            );

        return redirect()->route('sekolah.index');
    }

    public function destroy($id) {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();

        return redirect()->route('sekolah.index');
    }
}
