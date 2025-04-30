<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarPjController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Login;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Middleware\RoleMiddleware;

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
Route::get('/user/{name}', [UserController::class, 'show'])->middleware('auth');
Route::get('/user/{name?}', [UserController::class, 'optionalShow'])->middleware('auth');

Route::get('/daftarpj', [DaftarPjController::class, 'create']);
Route::get('/daftarpj/list_pj', [DaftarPjController::class, 'index']);
Route::post('/daftarpj/post', [DaftarPjController::class, 'store']);

Route::get('/Registrasi',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/Registrasi',[RegisterController::class, 'store']);

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

Route::middleware(['auth', RoleMiddleware::class . ':super_admin'])->group(function () {
    Route::get('/admin/permissions', [AdminPermissionController::class, 'index'])->name('admin.permissions.index');
    Route::post('/admin/permissions/{user}', [AdminPermissionController::class, 'updatePermissions'])->name('admin.permissions.update');
    Route::get('/admin/manage', [AdminPermissionController::class, 'index'])->name('admin.manage');
    Route::post('/admin/add', [AdminPermissionController::class, 'add'])->name('admin.add');
    Route::delete('/admin/remove/{id}', [AdminPermissionController::class, 'remove'])->name('admin.remove');
});