<?php
namespace App\Http\Controllers;

use App\Models\Angkatan;
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

    public function store(Request $request){

        Angkatan::create($request->validate([
            'tahun' => ['required', 'integer', 'min:1900', 'max:2100'],
        ]));

        return redirect()->route('angkatan.index');
    }

    public function show($id) {
        $angkatan = Angkatan::findOrFail($id);
        return view('angkatan.show', compact('angkatan'), ['title' => 'Show Page']);
    }

    public function edit($id) {
        $angkatan = Angkatan::findOrFail($id);
        return view('angkatan.edit', compact('angkatan'), ['title' => 'Edit Page']);
    }

    public function update(Request $request, $id){

        Angkatan::findOrFail($id)->update(
            $request->validate([
                'tahun' => ['required', 'integer', 'min:1900', 'max:2100'],
            ]));
        
        return redirect()->route('angkatan.index');
    }

    public function delete($id) {
        $angkatan = Angkatan::findOrFail($id);
        $angkatan->delete();

        return redirect()->route('angkatan.index');
    }
}
