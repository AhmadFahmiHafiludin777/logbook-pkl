<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Angkatan;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Yajra\DataTables\DataTables;

class AngkatanController extends Controller
{
    public function index() {

        abort_if(!auth()->user()->can('view-angkatan'), 403);

        return view('angkatan.index', ['title' => 'Angkatan Page']);
    }

    // public function getData(Request $request) {
    //     if (!$request->ajax()) {

    //         return response()->json(['error' => 'Unauthorized'], 401);

    //     }

    //     $angkatan = Angkatan::query();

    //     return DataTables::of($angkatan)
    //         ->addIndexColumn() 
    //         ->addColumn('action', function($row) {
                
    //             return '
    //             <div class="py-3 px-6 text-gray-700 flex"> 
    //             <a href="'.route('angkatan.show', $row->id).'" class="rounded-md bg-sky-500 text-lg text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300 ml-4"">Lihat</a>
    //                     <a href="'.route('angkatan.edit', $row->id).'" class="rounded-md bg-yellow-500 text-lg text-white px-2 py-1 ml-2 hover:border hover:border-yellow-600 transition duration-300"">Edit</a>
    //                     <form action="'.route('angkatan.destroy', $row->id).'" method="POST" style="display:inline;">
    //                         '.csrf_field().'
    //                         '.method_field('DELETE').'
    //                         <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1 ml-2 text-lg hover:border hover:border-red-800 transition duration-300" onclick="return confirm(\'Are you sure?\')">Delete</button>
    //                     </form>
    //             </div>';
                   
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);

    // }

    // public function getData(Request $request) {
    //     if (!$request->ajax()) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    
    //     $angkatan = Angkatan::query();
    
    //     return DataTables::of($angkatan)
    //         ->addIndexColumn()
    //         ->addColumn('action', function($row) {
    //             $hasRelation = $row->angkatanJurusanSekolah()->exists();
    //             if ($hasRelation) {
    //                 return '
    //                     <div class="py-3 px-6 text-gray-700 flex"> 
    //                         <a href="'.route('angkatan.show', $row->id).'" class="rounded-md bg-sky-500 text-lg text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300 ml-4">Lihat</a>
    //                         <a href="'.route('angkatan.edit', $row->id).'" class="rounded-md bg-yellow-500 text-lg text-white px-2 py-1 ml-2 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
    //                         <button type="button" class="bg-red-300 rounded-md text-white px-2 py-1 ml-2 text-lg cursor-not-allowed relative group">
    //                             Delete
    //                         </button>
    //                     </div>';
    //             }
    
    //             return '
    //             <div class="py-3 px-6 text-gray-700 flex"> 
    //                 <a href="'.route('angkatan.show', $row->id).'" class="rounded-md bg-sky-500 text-lg text-white px-2 py-1 hover:border hover:border-sky-600 transition duration-300 ml-4">Lihat</a>
    //                 <a href="'.route('angkatan.edit', $row->id).'" class="rounded-md bg-yellow-500 text-lg text-white px-2 py-1 ml-2 hover:border hover:border-yellow-600 transition duration-300">Edit</a>
    //                 <form action="'.route('angkatan.destroy', $row->id).'" method="POST" style="display:inline;">
    //                     '.csrf_field().'
    //                     '.method_field('DELETE').'
    //                     <button type="submit" class="bg-red-600 rounded-md text-white px-2 py-1 ml-2 text-lg hover:border hover:border-red-800 transition duration-300" onclick="return confirm(\'Are you sure?\')">Delete</button>
    //                 </form>
    //             </div>';
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }
    

    

    public function getData(Request $request) {

        abort_if(!auth()->user()->can('view-angkatan'), 403);

        if(!$request->ajax()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $angkatan = Angkatan::query();
        return DataTables::of($angkatan)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $hasRelation = $row->angkatanJurusanSekolah()->exists();
                return view('angkatan.partials.action', compact('row', 'hasRelation'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    

    // public function create() {
    //     if (!auth()->user()->hasPermissionTo('create-angkatan')) {
    //         throw UnauthorizedException::forPermissions([]);
    //     }
    //     return view('angkatan.create', ['title' => 'Tambah Page']);
    // }

    public function create() {
        abort_if(!auth()->user()->can('create-angkatan'), 403);

        return view('angkatan.create', ['title' => 'Tambah Page']);
    }

    

    public function store(StoreAngkatanRequest $request){

        Angkatan::create($request->validated());

        return redirect()->route('angkatan.index')->with('success', 'Data angkatan berhasil dibuat');
    }

    public function show(Angkatan $angkatan) {

        abort_if(!auth()->user()->can('view-angkatan'), 403);

        $angkatan->load('angkatanJurusanSekolah.jurusanSekolah.sekolah.jurusan');

        return view('angkatan.show', compact('angkatan'), ['title' => 'Show Page']);
    }

    public function edit(Angkatan $angkatan) {

        abort_if(!auth()->user()->can('edit-angkatan'), 403);

        return view('angkatan.edit', compact('angkatan',), ['title' => 'Edit Page']);
    }

    public function update(UpdateAngkatanRequest $request, Angkatan $angkatan){

        $angkatan->update($request->validated());

        return redirect()->route('angkatan.index')->with('success', 'Data angkatan berhasil diupdate');
    }

    public function destroy(Angkatan $angkatan) {

        abort_if(!auth()->user()->can('delete-angkatan'), 403);

        $angkatan->delete();

        return redirect()->route('angkatan.index')->with('success', 'Data angkatan berhasil dihapus');
    }

}
