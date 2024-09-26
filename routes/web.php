<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\SekolahController;
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

    // $siswa = Siswa::with('pembimbingLapangan')->get();
    return view('home', ['title' => 'Siswa Page', 'siswas' => Siswa::all()]);
});
Route::get('/welcome', function () {
    return view('welcome', ['title' => 'Dashboard Page']);
});
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

// server-side
Route::resource('angkatan', AngkatanController::class);
Route::get('/data', [AngkatanController::class, 'getData'])->name('data');

// client-side
Route::resource('sekolah', SekolahController::class);