<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\UserController;
use App\Models\Angkatan;
use App\Models\Jadwal;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\PembimbingLapangan;
use App\Models\PembimbingSekolah;
use App\Models\School;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\Facades\DataTables;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function() {

    Route::singleton('profile', ProfileController::class);
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

    Route::get('/home', function () {
        // $siswa = Siswa::with('pembimbingLapangan')->get();

    return view('home', ['title' => 'Home Page', 'siswas' => Siswa::all()]);
    })->name('home');

    Route::get('/schools', function () {
        return view('schools', ['title' => 'Team Page', 'sekolahs'=> Sekolah::all()]);
    });

    Route::get('/schools/{school:nama}', function(Sekolah $school){
    
        return view('school',[ 'title' => 'Single school', 'school' => $school ]);

    });

    Route::get('/projects', function () {
        return view('jurusan', ['title' => 'Jurusan Page', 'jurusans' => Jurusan::all()]);
    });

    Route::get('/about',function(){
        return view('about', ['title' => 'About Page']);

    });


    Route::resource('angkatan', AngkatanController::class);
    Route::get('/dataAngkatan', [AngkatanController::class, 'getData'])->name('data.angkatan');

    Route::get('/crud', function () {
        return view('crud', ['title' => 'CRUD Page']);
    })->middleware('permission:view-angkatan|view-sekolah');

        // client-side
    Route::resource('sekolah', SekolahController::class);


    Route::resource('jurusan', JurusanController::class);
    Route::get('/dataJurusan', [JurusanController::class, 'getData'])->name('data.jurusan');

    Route::resource('user', UserController::class);
    Route::get('/dataUser', [UserController::class, 'getData'])->name('data.user');
    Route::put('user/{user}/password', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::patch('user/{user}/restore', [UserController::class, 'restore'])->name('user.restore');
    
    // Impersonate
    Route::get('/user/impersonate/{user}', [UserController::class, 'impersonate'])
        ->name('user.impersonate');

    Route::impersonate();


});







