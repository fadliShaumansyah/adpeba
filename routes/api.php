<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\auth\middleware\authenticate;;
use App\Http\Controllers\Api\ApiDaftarPj;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

#untuk meng akses dan menampilkan daftarpj
// Route untuk API Daftarpj
Route::get('/daftarpj', [ApiDaftarPj::class, 'getDaftarpj']);
Route::get('/daftarpj/{id}', [ApiDaftarPj::class, 'show']);
Route::post('/daftarpj', [ApiDaftarPj::class, 'store']);
Route::put('/daftarpj/{id}', [ApiDaftarPj::class, 'update']);
Route::delete('/daftarpj/{id}', [ApiDaftarPj::class, 'destroy']);