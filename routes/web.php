<?php

use App\Models\School;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/schools', function () {
    return view('schools', ['title' => 'Team Page', 'schools'=> School::all()]);
});
Route::get('/schools/{slug}', function($slug){
    
    $school = School::find($slug);
        return view('school',[ 'title' => 'Single school', 'school' => $school ]);

});
Route::get('/projects', function () {
    return view('projects', ['title' => 'Projects Page']);
});
