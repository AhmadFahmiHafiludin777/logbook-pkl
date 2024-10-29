<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Angkatan;
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
        $sekolah = Sekolah::all();
        return view('sekolah.index', compact('sekolah'), ['title' => 'Sekolah Page']);
    }

    public function create() {
        if (!auth()->user()->hasPermissionTo('create-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }

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

        if (!auth()->user()->hasPermissionTo('edit-sekolah')) {
            throw UnauthorizedException::forPermissions([]);
        }
        
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
