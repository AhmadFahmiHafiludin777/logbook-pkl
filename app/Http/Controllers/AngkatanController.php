<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Angkatan;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    public function index() {

        $angkatan = Angkatan::simplePaginate(5);

        return view('angkatan.index', compact('angkatan'), ['title' => 'Angkatan Page']);
    }

    public function create() {
        return view('angkatan.create', ['title' => 'Tambah Page']);
    }

    public function store(StoreAngkatanRequest $request){

        Angkatan::create($request->validated());

        return redirect()->route('angkatan.index');
    }

    public function show(Angkatan $angkatan) {

        return view('angkatan.show', compact('angkatan'), ['title' => 'Show Page']);
    }

    public function edit(Angkatan $angkatan) {

        return view('angkatan.edit', compact('angkatan',), ['title' => 'Edit Page']);
    }

    public function update(UpdateAngkatanRequest $request, Angkatan $angkatan){

        $angkatan->update($request->validated());

        return redirect()->route('angkatan.index');
    }

    public function destroy(Angkatan $angkatan) {
        $angkatan->delete();

        return redirect()->route('angkatan.index');
    }
}
