<?php

use App\Models\Angkatan;
use App\Models\Jurusan;
use App\Models\PembimbingLapangan;
use App\Models\School;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {

    // dump("Bagaimana caranya mendapatkan data berikut: Sekolah X pernah terdaftar PKL pada Tahun/Angkatan berapa saja?");

    // $tahun = DB::table('sekolahs as s')
    // ->join('jurusan_sekolahs as js', 's.id', '=', 'js.sekolah_id')
    // ->join('angkatan_jurusan_sekolahs as ajs', 'js.id', '=', 'ajs.jurusan_sekolah_id')
    // ->join('angkatans as a', 'ajs.angkatan_id', '=', 'a.id')
    // ->where('s.nama', 'SMK 9 Solok')
    // ->select('a.tahun')
    // ->get();

    // dump($tahun);

    // dump("Bagaimana caranya mendapatkan data berikut: Pada Tahun/Angkatan 2024, Sekolah mana saja yang mendaftar PKL?");

    // $sekolah = DB::table('angkatans as a')
    // ->join('angkatan_jurusan_sekolahs as ajs', 'a.id', '=', 'ajs.angkatan_id')
    // ->join('jurusan_sekolahs as js', 'ajs.jurusan_sekolah_id', '=', 'js.id')
    // ->join('sekolahs as s', 'js.sekolah_id', '=', 's.id')
    // ->where('a.tahun', '2014')
    // ->select('s.nama')
    // ->get();

    // dump($sekolah);

    // // $soal = Sekolah::whereHas('jurusanSekolah', function ($query) {
    // //     $query->whereHas('angkatan_jurusan_sekolahs', function ($query) {
    // //         $query->whereHas('angkatans', function ($query) {
    // //             $query->where('tahun', 2014);
    // //         });
    // //     });
    // // })
    // // ->get()
    // // ->toArray();
    
    // // dump($soal);


    // dump("Bagaimana caranya mendapatkan data berikut: Jurusan apa saja yang terdaftar PKL dari Sekolah X pada Tahun/Angkatan 2024?");

    // $jurusan = DB::table('angkatans as a')
    // ->join('angkatan_jurusan_sekolahs as ajs', 'a.id', '=', 'ajs.angkatan_id')
    // ->join('jurusan_sekolahs as js', 'ajs.jurusan_sekolah_id', '=', 'js.id')
    // ->join('sekolahs as s', 'js.sekolah_id', '=', 's.id')
    // ->join('jurusans as j', 'js.jurusan_id', '=', 'j.id')
    // ->where('a.tahun', 2014)
    // ->where('s.nama', 'SMK 9 Solok')
    // ->select('j.kode', 'j.nama')
    // ->get();
    
    // dump($jurusan);

    // dump("Bagaimana caranya mendapatkan data berikut: Sekolah mana saja yang terdaftar PKL pada Tahun/Angkatan 2024 dan memiliki Jurusan PPLG?");

    // $sekolah1 = DB::table('jurusans as j')
    // ->join('jurusan_sekolahs as js', 'j.id', '=', 'js.jurusan_id')
    // ->join('sekolahs as s', 'js.sekolah_id', '=', 's.id')
    // ->join('angkatan_jurusan_sekolahs as ajs', 'js.id', '=', 'ajs.jurusan_sekolah_id')
    // ->join('angkatans as a', 'ajs.angkatan_id', '=', 'a.id')
    // ->where('j.kode', 'SRD')
    // ->where('a.tahun', '2014')
    // ->select('s.nama')
    // ->get();

    // dump($sekolah1);

    // $siswa = Siswa::with('pembimbingLapangan')->get();
    return view('home', ['title' => 'Siswa Page', 'siswas' => Siswa::all()]);
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

Route::get('/soal', function () {
    dump("1. data 1 user pertama");
    $no1 = User::find(1)->toArray();
    dump($no1);

    dump("2. data seluruh user");
    $no2 = User::all()->toArray();
    dump($no2);

    dump("3. seluruh data user dengan id > 5 (nomor id 6, 7, 8, dst)");
    $no3 = User::where('id', '>', 5)->get()->toArray();
    dump($no3);

    dump("4. data 10 user pertama dengan id > 5");
    $no4 = User::where('id', '>', 5)->take(5)->get()->toArray();
    dump($no4);

    dump("5. data 10 user pertama dengan id > 5, diurutkan berdasarkan abjad nama/emailnya (A ke Z)");
    $no5 = User::where('id', '>', 5)->take(5)->orderBy('name', 'asc')->get()->toArray();
    dump($no5);

    dump("6. data 10 user pertama dengan id > 5, diurutkan berdasarkan tgl created_at (baru ke lama)");
    dump();

    dump("7. data user pertama dengan id > 5");
    $no7 = User::where('id', '>', 5)->take(1)->get()->toArray();
    dump($no7);

    dump("8. data user dengan id 5");
    $no8 = User::find(5)->toArray();
    dump($no8);

    dump("9. data user dengan id 5, namun hanya di select nama dan email nya");
    $no9 = User::where('id', 5)->select('name', 'email')->get()->toArray();
    dump($no9);

    dump("10. data user dengan kolom nama/email berawalan dengan huruf A");
    dump();

    dump("11. data user dengan kolom nama/email berawalan dengan huruf A DAN memiliki id > 5");
    dump();

    dump("12. data user dengan kolom nama/email berawalan dengan huruf A ATAU mengandung kata admin");
    dump();
});


