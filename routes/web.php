<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarPjController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Login;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/inputanggota', function () {
    return view('inputanggota');
});

//Rute dengan parameter
//  Route::get('/user/{name}', function ($name) {
//    return 'Nama saya adalah Fadli ' . $name;
//    });



//Route dengan parameter optional
//Route::get('/user/{name?}', function ($name = 'Fadli') {
//    return 'Nama saya adalah ' . $name;
//    });
//


#menghubungkat route dengan controller
Route::get('/user/{name}', [UserController::class, 'show']);
Route::get('/user/{name?}', [UserController::class, 'optionalShow']);

Route::get('/daftarpj', [DaftarPjController::class, 'create']);
Route::get('/daftarpj/list_pj', [DaftarPjController::class, 'index']);
Route::post('/daftarpj/post', [DaftarPjController::class, 'store']);

Route::get('/Registrasi',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/Registrasi',[RegisterController::class, 'store'])->middleware('guest');

Route::get('/login',[Login::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[Login::class, 'authenticate']);
Route::get('/logout',[Login::class, 'logout']);


Route::get('/blog', function () {
    return view('blog');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/portofolio', function () {
    return view('blog');
});
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');