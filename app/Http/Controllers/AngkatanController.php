<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Angkatan;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AngkatanController extends Controller
{
    public function index() {

        $angkatan = Angkatan::all();

        return view('angkatan.index', compact('angkatan'), ['title' => 'Angkatan Page']);
    }

    public function getData(Request $request) {
        if ($request->ajax()) {
            $angkatan = Angkatan::query();

            return DataTables::of($angkatan)
                ->addIndexColumn() 
                ->addColumn('action', function($row) {
                
                    return '
                    <div class="py-3 px-6 text-gray-700 flex"> 
                    <a href="'.route('angkatan.show', $row->id).'" class="rounded-md bg-sky-500 text-lg text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300 ml-4"">Lihat</a>
                            <a href="'.route('angkatan.edit', $row->id).'" class="rounded-md bg-yellow-500 text-lg text-white px-2 py-1 ml-2 hover:border hover:border-yellow-600 transition duration-300"">Edit</a>
                            <form action="'.route('angkatan.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1 ml-2 text-lg hover:border hover:border-red-800 transition duration-300" onclick="return confirm(\'Are you sure?\')">Delete</button>
                            </form>
                     </div>';
                   
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
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
