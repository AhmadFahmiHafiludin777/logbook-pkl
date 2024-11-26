<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Lab404\Impersonate\Models\Impersonate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->can( 'view-user'), 403);

        return view('user.index', ['title' => 'User Page']);

    }

    public function getData(Request $request) {

        abort_if(!auth()->user()->can('view-user'), 403);

        if(!$request->ajax()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = User::with(['roles'])->withTrashed()->select('id', 'name', 'email', 'deleted_at');
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('roles', function($user) {
                return $user->roles->isNotEmpty() ? $user->roles->pluck('name')->implode(' && ') : '-';
            })
            ->addColumn('action', function($row) {

                return view('user.partials.action', compact('row'))->render();
            })
            ->rawColumns(['action', 'role'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!auth()->user()->can('create-user'), 403);

        $roles = Role::all();

        return view('user.create', compact('roles'), ['title' => 'Tambah User']);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        abort_if(!auth()->user()->can('create-user'), 403);

        $validatedData = $request->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user =  User::create($validatedData);

        $user->roles()->sync($request->roles);

        return redirect()->route('user.index')->with('success', 'User berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort_if(!auth()->user()->can('view-user'), 403);

        return view('user.show', compact('user'), ['title' => 'Show Page']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_if(!auth()->user()->can('edit-user'), 403);

        $roles = Role::all();

        $userRoles = $user->roles->pluck('id')->toArray();

        return view('user.edit', compact('user', 'roles', 'userRoles'), ['title' => 'Edit Page']);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        abort_if(!auth()->user()->can('edit-user'), 403);

        $user->update($request->validated());

        $user->roles()->sync($request->roles);

        return redirect()->route('user.index')->with('success', 'User berhasil diupdate');

    }

    public function updatePassword(Request $request, User $user) {
        abort_if(!auth()->user()->can(abilities: 'edit-user'), 403);

        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);


        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Password berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_if(!auth()->user()->can('delete-user'), 403);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
    }

    public function restore($id) {
        abort_if(!auth()->user()->can('delete-user'), code: 403);

        $user = User::withTrashed()->findOrFail($id);

        $user->restore();

        return redirect()->route('user.index')->with('success', 'User berhasil direstore');;
    }

    public function impersonate(User $user) {
        abort_if(!auth()->user()->can('impersonate-user'), code: 403);

            auth()->user()->impersonate($user);
    
        return redirect()->route('home')->with('success', 'Anda sekarang berimpersonasi sebagai ' . $user->name);
    }


}
