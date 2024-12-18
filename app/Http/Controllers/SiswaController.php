<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Models\AngkatanJurusanSekolah;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->can('view-siswa'), 403);
        return view('siswa.index', ['title' => 'Siswa Page']);
    }
    public function getData(Request $request) {
        abort_if(!auth()->user()->can('view-siswa'), 403);
        if(!$request->ajax()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $siswa = Siswa::query();
        return DataTables::of($siswa)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $hasRelation = $row->angkatanJurusanSekolah()->exists();
                return view('siswa.partials.action', compact('row', 'hasRelation'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create-siswa'), 403);
        $angkatanJurusanSekolah = AngkatanJurusanSekolah::all();
        $pembimbingLapangan = PembimbingLapangan::all();
        $pembimbingSekolah = PembimbingSekolah::all();

        return view('siswa.create', compact('angkatanJurusanSekolah', 'pembimbingLapangan', 'pembimbingSekolah'), ['title' => 'Tambah Siswa']);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        Siswa::create($request->validated());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dibuat');
    }
    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        abort_if(!auth()->user()->can('view-siswa'), 403);

        $angkatanJurusanSekolah = $siswa->angkatanJurusanSekolah;
        $pembimbingLapangan = $siswa->pembimbingLapangan;
        $pembimbingSekolah = $siswa->pembimbingSekolah;


        return view('siswa.show', compact('siswa', 'angkatanJurusanSekolah', 'pembimbingLapangan', 'pembimbingSekolah'), ['title' => 'Show Page']);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        abort_if(!auth()->user()->can('edit-siswa'), 403);

        $angkatanJurusanSekolah = AngkatanJurusanSekolah::with('angkatan', 'jurusanSekolah')->get();
        $pembimbingLapangan = PembimbingLapangan::all();
        $pembimbingSekolah = PembimbingSekolah::all();
        return view('siswa.edit', compact('siswa', 'angkatanJurusanSekolah', 'pembimbingLapangan', 'pembimbingSekolah'), ['title' => 'Edit Siswa']);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, Siswa $siswa)
    {
        $siswa->update($request->validated());
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        abort_if(!auth()->user()->can('delete-siswa'), 403);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
