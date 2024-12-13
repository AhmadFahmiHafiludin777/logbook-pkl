<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Exceptions\UnauthorizedException;

class SekolahController extends Controller
{
    use AuthorizesRequests;
    
    public function index() {

        if (!auth()->user()->can('view-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }

        $sekolah = Sekolah::with('jurusan')->get();
        return view('sekolah.index', compact('sekolah'), ['title' => 'Sekolah Page']);
    }

    public function create( Sekolah $sekolah) {
        if (!auth()->user()->can('create-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }

        $jurusan = Jurusan::all();
        return view('sekolah.create', compact('sekolah', 'jurusan'),['title' => 'Tambah Page']);
    }

    public function store(StoreSekolahRequest $request){

        $sekolah = Sekolah::create($request->validated());

        $sekolah->jurusan()->sync($request->jurusan ?? []);

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil dibuat');

    }

    public function show(Sekolah $sekolah) {

        if (!auth()->user()->can('view-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }

        return view('sekolah.show', compact('sekolah'), ['title' => 'Show Page']);
    }

    public function edit(Sekolah $sekolah) {

        if (!auth()->user()->can('edit-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }

        $jurusan = Jurusan::all();
        $sekolah->load('jurusan');
        
        return view('sekolah.edit', compact('sekolah', 'jurusan'), ['title' => 'Edit Page']);
    }

    public function update(UpdateSekolahRequest $request, Sekolah $sekolah){

        $sekolah->update($request->validated());

        $sekolah->jurusan()->sync($request->jurusan ?? []);

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil diupdate');
    }

    public function destroy(Sekolah $sekolah) {

        if (!auth()->user()->can('delete-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }

        $sekolah->delete();

        return redirect()->route('sekolah.index')->with('success', 'Data sekolah berhasil dihapus');
    }
}
