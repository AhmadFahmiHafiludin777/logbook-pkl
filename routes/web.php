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


Route::resource('angkatan', AngkatanController::class);


// CRUD Sekolah
// Route::get('/sekolah', [SekolahController::class, 'tampil'])->name('sekolah.tampil');
// Route::get('/sekolah/tambah', [SekolahController::class, 'tambah'])->name('sekolah.tambah');
// Route::post('/sekolah/submit', [SekolahController::class, 'submit'])->name('sekolah.submit');
// Route::get('sekolah/edit{id}', [SekolahController::class, 'edit']) ->name('sekolah.edit');
// Route::post('sekolah/update{id}', [SekolahController::class, 'update']) ->name('sekolah.update');
// Route::post('sekolah/delete{id}', [SekolahController::class, 'delete']) ->name('sekolah.delete');

Route::resource('sekolah', SekolahController::class);





Route::get('/soaluser', function () {
    dump("1. data 1 user pertama");
    $no1 = User::first()->toArray();  
    dump($no1);

    dump("2. data seluruh user");
    $no2 = User::all()->toArray();
    dump($no2);

    dump("3. seluruh data user dengan id > 5 (nomor id 6, 7, 8, dst)");
    $no3 = User::where('id', '>', 5)->get()->toArray();
    dump($no3);

    dump("4. data 10 user pertama dengan id > 5");
    $no4 = User::where('id', '>', 5)->limit(10)->get()->toArray();
    dump($no4);

    dump("5. data 10 user pertama dengan id > 5, diurutkan berdasarkan abjad nama/emailnya (A ke Z)");
    $no5 = User::where('id', '>', 5)->limit(10)->orderBy('name', 'asc')->get()->toArray();
    dump($no5);

    dump("6. data 10 user pertama dengan id > 5, diurutkan berdasarkan tgl created_at (baru ke lama)");
    $no6 = User::where('id', '>', 5)->orderBy('created_at', 'desc')->limit(10)->get()->toArray();
    dump($no6);

    dump("7. data user pertama dengan id > 5");
    $no7 = User::where('id', '>', 5)->limit(1)->get()->toArray();
    dump($no7);

    dump("8. data user dengan id 5");
    $no8 = User::find(5)->toArray();
    dump($no8);

    dump("9. data user dengan id 5, namun hanya di select nama dan email nya");
    $no9 = User::where('id', 5)->select('name', 'email')->get()->toArray();
    dump($no9);

    dump("10. data user dengan kolom nama/email berawalan dengan huruf A");
    $no10 = User::where('name', 'like', 'A%')->get()->toArray();
    dump($no10);

    dump("11. data user dengan kolom nama/email berawalan dengan huruf A DAN memiliki id > 5");
    $no11 = User::where('name', 'like', 'A%')->where('id', '>', 5)->get()->toArray();
    dump($no11);

    dump("12. data user dengan kolom nama/email berawalan dengan huruf A ATAU mengandung kata admin");
    $no12 = User::where('name', 'like', 'A%')->orWhere('name', 'like', '%admin%')->get()->toArray();
    dump($no12);
});

Route::get('/soalsiswa', function () {
    dump("1. data 1 siswa pertama");
    dump(Siswa::first()->toArray());

    dump("2. data seluruh siswa");
    dump(Siswa::all()->toArray());

    dump("3. seluruh data siswa dengan id > 5 (nomor id 6, 7, 8, dst)");
    dump(Siswa::where('id', '>', 5)->get()->toArray());

    dump("4. data 10 siswa pertama dengan id > 5");
    dump(Siswa::where('id', '>', 5)->limit(10)->get()->toArray());

    dump("5. data 10 siswa pertama dengan id > 5, diurutkan berdasarkan abjad nama/emailnya (A ke Z)");
    dump(Siswa::where('id', '>', 5)->limit(10)->orderBy('nama', 'asc')->get()->toArray());

    dump("6. data 10 siswa pertama dengan id > 5, diurutkan berdasarkan tgl created_at (baru ke lama)");
    dump(Siswa::where('id', '>', 5)->limit(10)->orderBy('created_at', 'desc')->get()->toArray());

    dump("7. data siswa pertama dengan id > 5");
    dump(Siswa::where('id', '>', 5)->first()->toArray());

    dump("8. data siswa dengan id 5");
    dump(Siswa::find(5)->toArray());

    dump("9. data siswa dengan id 5, namun hanya di select nama dan email nya");
    dump(Siswa::where('id', 5)->select('nama', 'email')->get()->toArray());

    dump("10. data siswa dengan kolom nama/email berawalan dengan huruf A");
    dump(Siswa::where('nama', 'like', 'A%')->get()->toArray());

    dump("11. data siswa dengan kolom nama/email berawalan dengan huruf A DAN memiliki id > 5");
    dump(Siswa::where('id', '>', 5)->where('nama', 'like', 'A%')->where('id', '>', 5)->get()->toArray());

    dump("12. data siswa dengan kolom nama/email berawalan dengan huruf A ATAU mengandung kata siswa");
    dump(Siswa::where('nama', 'like', 'A%')->orWhere('nama', 'like', '%siswa%')->get()->toArray());

});

Route::get('/tugassoal', function() {
        
    dump("1. Tampilkan daftar Siswa yang terdaftar di SMK 9 Sorong");
    dump(Siswa::whereRelation('angkatanJurusanSekolah.jurusanSekolah.sekolah', 'nama', 'SMK 9 Sorong')->get()->toArray());

    dump("2. Tampilkan semua Siswa yang memiliki Jurusan PHP ");
    dump(Siswa::whereRelation('angkatanJurusanSekolah.jurusanSekolah.jurusan', 'kode', 'PHP')->get()->toArray());

    dump("3. Bagaimana cara mendapatkan nama Sekolah dari Siswa yang bernama Ayu Rahimah");
    dump(Sekolah::whereRelation('jurusanSekolah.angkatanJurusanSekolah.siswa', 'nama', 'Ayu Rahimah')->get()->toArray());

    dump("4. Kegiatan apa saja yang dilakukan ketika jadwalnya adalah Cindy Pratiwi  ");
    dump(Kegiatan::whereRelation('jadwal', 'nama', 'Cindy Pratiwi')->select('deskripsi')->get()->toArray());

    dump("5. Pada tanggal berapa dilakukannya kegiatan Omnis vel sunt ratione dolores quia voluptatum vero. Dolores aliquid sed error maiores. Vel quo aut officia enim. Vero laboriosam nam laboriosam voluptatem. ");
    dump(Jadwal::whereRelation('kegiatan', 'deskripsi', 'Omnis vel sunt ratione dolores quia voluptatum vero. Dolores aliquid sed error maiores. Vel quo aut officia enim. Vero laboriosam nam laboriosam voluptatem.')->select('tanggal')->get()->toArray());

    dump("6. Angkatan berapa saja yang memiliki jurusan UAH");
    dump(Angkatan::whereRelation('angkatanJurusanSekolah.jurusanSekolah.jurusan', 'kode', 'UAH')->select('tahun')->get()->toArray());

    dump("7. Setiap pembimbing sekolah memiliki banyak siswa. Tampilkan daftar siswa yang dibimbing oleh Rachel Wijayanti ");
    dump(Siswa::whereHas('pembimbingSekolah', function($query){
        $query->where('nama', 'Rachel Wijayanti');
    })->get()->toArray());

    dump("8. Pembimbing Lapangan yang bernama Samsul Daliman Sitorus membimbing di jurusan apa");
    dump(Jurusan::whereRelation('jurusanSekolah.angkatanJurusanSekolah.pembimbingLapangan', 'nama', 'Samsul Daliman Sitorus')->select('kode', 'nama')->get()->toArray());

    dump("9. Tampilkan pembimbing lapangan yang membimbing lebih dari 3 siswa");
    dump(PembimbingLapangan::has('siswa', '>', 3)->get()->toArray());

    dump("10. Tampilkan user yang memiliki kegiatan yang statusnya sudah dan lebih dari 2");
    dump(User::whereHas('kegiatan', function($query){
        $query->where('status', 'sudah');
    }, '>', 2)->get()->toArray());


});



