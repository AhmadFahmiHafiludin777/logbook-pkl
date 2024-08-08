<?php

use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\PembimbingLapangan;
use App\Models\School;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    dump("Bagaimana caranya mendapatkan data berikut: Sekolah X pernah terdaftar PKL pada Tahun/Angkatan berapa saja?");

    $tahun = DB::table('sekolahs as s')
    ->join('jurusan_sekolahs as js', 's.id', '=', 'js.sekolah_id')
    ->join('angkatan_jurusan_sekolahs as ajs', 'js.id', '=', 'ajs.jurusan_sekolah_id')
    ->join('angkatans as a', 'ajs.angkatan_id', '=', 'a.id')
    ->where('s.nama', 'SMK 9 Solok')
    ->select('a.tahun')
    ->get();

    dump($tahun);

    dump("Bagaimana caranya mendapatkan data berikut: Pada Tahun/Angkatan 2024, Sekolah mana saja yang mendaftar PKL?");

    $sekolah = DB::table('angkatans as a')
    ->join('angkatan_jurusan_sekolahs as ajs', 'a.id', '=', 'ajs.angkatan_id')
    ->join('jurusan_sekolahs as js', 'ajs.jurusan_sekolah_id', '=', 'js.id')
    ->join('sekolahs as s', 'js.sekolah_id', '=', 's.id')
    ->where('a.tahun', '2014')
    ->select('s.nama')
    ->get();

    dump($sekolah);

    dump("Bagaimana caranya mendapatkan data berikut: Jurusan apa saja yang terdaftar PKL dari Sekolah X pada Tahun/Angkatan 2024?");

    $jurusan = DB::table('angkatans as a')
    ->join('angkatan_jurusan_sekolahs as ajs', 'a.id', '=', 'ajs.angkatan_id')
    ->join('jurusan_sekolahs as js', 'ajs.jurusan_sekolah_id', '=', 'js.id')
    ->join('sekolahs as s', 'js.sekolah_id', '=', 's.id')
    ->join('jurusans as j', 'js.jurusan_id', '=', 'j.id')
    ->where('a.tahun', 2014)
    ->where('s.nama', 'SMK 9 Solok')
    ->select('j.kode', 'j.nama')
    ->get();
    
    dump($jurusan);

    dump("Bagaimana caranya mendapatkan data berikut: Sekolah mana saja yang terdaftar PKL pada Tahun/Angkatan 2024 dan memiliki Jurusan PPLG?");

    $sekolah1 = DB::table('jurusans as j')
    ->join('jurusan_sekolahs as js', 'j.id', '=', 'js.jurusan_id')
    ->join('sekolahs as s', 'js.sekolah_id', '=', 's.id')
    ->join('angkatan_jurusan_sekolahs as ajs', 'js.id', '=', 'ajs.jurusan_sekolah_id')
    ->join('angkatans as a', 'ajs.angkatan_id', '=', 'a.id')
    ->where('j.kode', 'SRD')
    ->where('a.tahun', '2014')
    ->select('s.nama')
    ->get();

    dump($sekolah1);
    // return view('home', ['title' => 'Siswa Page', 'siswas' => Siswa::all()]);
});
Route::get('/welcome', function () {
    return view('welcome');
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


