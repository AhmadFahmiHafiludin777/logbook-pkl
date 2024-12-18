<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembimbingSekolahRequest;
use App\Http\Requests\UpdatePembimbingSekolahRequest;
use App\Models\PembimbingSekolah;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PembimbingSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->can('view-pembimbing-sekolah'), 403);

        return view('pembimbing-sekolah.index', ['title' => 'Pembimbing Sekolah Page']);
    }

    public function getData(Request $request) {

        abort_if(!auth()->user()->can('view-pembimbing-sekolah'), 403);

        if(!$request->ajax()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $pembimbingSekolah = PembimbingSekolah::query();
        return DataTables::of($pembimbingSekolah)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $hasRelation = $row->siswa()->exists();
                return view('pembimbing-sekolah.partials.action', compact('row', 'hasRelation'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can(abilities: 'create-pembimbing-sekolah'), 403);

        return view('pembimbing-sekolah.create',  ['title' => 'Tambah Pembimbing Lapangan']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembimbingSekolahRequest $request)
    {
        PembimbingSekolah::create($request->validated());

        return redirect()->route('pembimbingSekolah.index')->with('success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(PembimbingSekolah $pembimbingSekolah)
    {
        abort_if(!auth()->user()->can('view-pembimbing-sekolah'), 403);

        $siswa = $pembimbingSekolah->siswa()->get();

        return view('pembimbing-sekolah.show', compact('pembimbingSekolah', 'siswa'), ['title' => 'Show Page']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembimbingSekolah $pembimbingSekolah)
    {
        abort_if(!auth()->user()->can('edit-pembimbing-sekolah'), 403);

        return view('pembimbing-sekolah.edit', compact('pembimbingSekolah'), ['title' => 'Edit Page']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembimbingSekolahRequest $request, PembimbingSekolah $pembimbingSekolah)
    {
        $pembimbingSekolah->update($request->validated());

        return redirect()->route('pembimbingSekolah.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembimbingSekolah $pembimbingSekolah)
    {
        abort_if(!auth()->user()->can('delete-pembimbing-sekolah'), 403);

        $pembimbingSekolah->delete();

        return redirect()->route('pembimbingSekolah.index')->with('success', 'Data berhasil dihapus');
    }
}
