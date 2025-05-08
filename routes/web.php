<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarPjController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Login;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inputanggota', function () {
    return view('inputanggota');
})->middleware('auth');

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

Route::get('/inputpj', [DaftarPjController::class, 'create'])->name('inputpj');
Route::get('/list_pj', [DaftarPjController::class, 'index'])->name('list_pj');
Route::post('/daftarpj/post', [DaftarPjController::class, 'store']);

Route::get('/Registrasi',[RegisterController::class, 'index'])->name('Registrasi')->middleware('guest');
Route::post('/Registrasi',[RegisterController::class, 'store']);

Route::get('/login',[Login::class, 'index'])->middleware('guest');
Route::post('/login',[Login::class, 'authenticate'])->name('login');           
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
})->name('dashboard')->middleware('auth');

Route::middleware(['auth', RoleMiddleware::class . ':super_admin'])->group(function () {
    Route::get('/admin/permissions', [AdminPermissionController::class, 'index'])->name('admin.permissions.index');
    Route::post('/admin/permissions', [AdminPermissionController::class, 'PromoteToAdmin'])->name('admin.permissions.update');
    Route::get('/admin/manage', [AdminPermissionController::class, 'index'])->name('admin.manage');
    Route::post('/admin/add', [AdminPermissionController::class, 'add'])->name('admin.add');
    Route::delete('/admin/remove/{id}', [AdminPermissionController::class, 'remove'])->name('admin.remove');
});
Route::middleware(['auth', AdminMiddleware::class . ':admin'])->group(function () {
    Route::get('/jamiyyah', function (){
        return view('components.jamiyyah');})->name('jamiyyah');
    Route::get('/kaderisasi', function (){
        return view('kaderisasi.index');})->name('kaderisasi');
    Route::get('/osb', function (){
        return view('osb.index');})->name('osb');
    Route::get('/pendidikan', function (){
        return view('pendidikan.silatsuta');})->name('silatsuta');
    Route::get('/sosial', function (){
        return view('sosial.index');})->name('sosial');
    Route::get('/dakwah', function (){
        return view('dakwah.index');})->name('dakwah');
});
// Rute untuk menampilkan halaman profil
Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth');

// Rute untuk menampilkan halaman edit profil
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('editprofil')->middleware('auth');

// Rute untuk mengupdate data profil setelah disubmit
Route::post('/profile/update', [UserController::class, 'updateProfile'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/createpost', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');
});


Route::get('/admin/promote', [AdminPermissionController::class, 'showPromoteForm'])->name('admin.promote');
Route::post('/admin/promote', [AdminPermissionController::class, 'promoteToAdmin'])->name('admin.promote.set');
