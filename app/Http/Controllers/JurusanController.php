<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        abort_if(!auth()->user()->can('view-jurusan'), 403);

        return view('jurusan.index', ['title' => 'Jurusan Page']);
    }

    public function getData(Request $request) {

        abort_if(!auth()->user()->can('view-jurusan'), 403);

        if(!$request->ajax()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $jurusan = Jurusan::query();
        return DataTables::of($jurusan)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $hasRelation = $row->jurusanSekolah()->exists();
                return view('jurusan.partials.action', compact('row', 'hasRelation'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create-jurusan'), 403);

        return view('jurusan.create', ['title' => 'Tambah Jurusan']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJurusanRequest $request)
    {
        Jurusan::create($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        abort_if(!auth()->user()->can('view-jurusan'), 403);

        return view('jurusan.show', compact('jurusan'), ['title' => 'Show Page']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        abort_if(!auth()->user()->can('edit-jurusan'), 403);

        return view('jurusan.edit', compact('jurusan',), ['title' => 'Edit Page']);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan)
    {
        $jurusan->update($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        abort_if(!auth()->user()->can('delete-jurusan'), 403);

        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data jurusan berhasil dihapus');
    }
}
