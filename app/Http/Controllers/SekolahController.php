<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Angkatan;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index() {
        $sekolah = Sekolah::all();
        return view('sekolah.index', compact('sekolah'), ['title' => 'Sekolah Page']);
    }


    public function create() {
        return view('sekolah.create', ['title' => 'Tambah Page']);
    }

    public function store(StoreSekolahRequest $request){

        Sekolah::create($request->validated());

        return redirect()->route('sekolah.index');
    }

    public function show(Sekolah $sekolah) {

        return view('sekolah.show', compact('sekolah'), ['title' => 'Show Page']);
    }

    public function edit(Sekolah $sekolah) {

        return view('sekolah.edit', compact('sekolah'), ['title' => 'Edit Page']);
    }

    public function update(UpdateSekolahRequest $request, Sekolah $sekolah){

        $sekolah->update($request->validated());

        return redirect()->route('sekolah.index');
    }

    public function destroy(Sekolah $sekolah) {

        $sekolah->delete();

        return redirect()->route('sekolah.index');
    }
}
