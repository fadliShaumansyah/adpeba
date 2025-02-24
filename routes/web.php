<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarPjController;

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

Route::get('/daftarpj', [DaftarPjController::class, 'index']);
Route::post('/daftarpj/post', [DaftarPjController::class, 'store']);
