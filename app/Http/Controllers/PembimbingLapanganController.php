<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembimbingLapanganRequest;
use App\Http\Requests\UpdatePembimbingLapanganRequest;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembimbingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->can('view-pembimbing-lapangan'), 403);

        return view('pembimbing-lapangan.index', ['title' => 'Pembimbing Lapangan Page']);
    }

    public function getData(Request $request) {

        abort_if(!auth()->user()->can('view-pembimbing-lapangan'), 403);

        if(!$request->ajax()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $pembimbingLapangan = PembimbingLapangan::query();
        return DataTables::of($pembimbingLapangan)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $hasRelation = $row->siswa()->exists();
                return view('pembimbing-lapangan.partials.action', compact('row', 'hasRelation'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can(abilities: 'create-pembimbing-lapangan'), 403);

        return view('pembimbing-lapangan.create',  ['title' => 'Tambah Pembimbing Lapangan']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembimbingLapanganRequest $request)
    {
        PembimbingLapangan::create($request->validated());

        return redirect()->route('pembimbingLapangan.index')->with('success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PembimbingLapangan $pembimbingLapangan)
    {
        abort_if(!auth()->user()->can('view-pembimbing-lapangan'), 403);

        $siswa = $pembimbingLapangan->siswa()->get();

        return view('pembimbing-lapangan.show', compact('pembimbingLapangan', 'siswa'), ['title' => 'Show Page']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembimbingLapangan $pembimbingLapangan)
    {
        abort_if(!auth()->user()->can('edit-pembimbing-lapangan'), 403);

        return view('pembimbing-lapangan.edit', compact('pembimbingLapangan'), ['title' => 'Edit Page']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembimbingLapanganRequest $request, PembimbingLapangan $pembimbingLapangan)
    {
        $pembimbingLapangan->update($request->validated());

        return redirect()->route('pembimbingLapangan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembimbingLapangan $pembimbingLapangan)
    {
        abort_if(!auth()->user()->can('delete-pembimbing-lapangan'), 403);

        $pembimbingLapangan->delete();

        return redirect()->route('pembimbingLapangan.index')->with('success', 'Data berhasil dihapus');
    }
}
