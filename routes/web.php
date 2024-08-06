<?php

use App\Models\Jurusan;
use App\Models\School;
use App\Models\Sekolah;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
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

