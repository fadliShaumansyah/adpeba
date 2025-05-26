<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DaftarPjController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Login;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Post;
use App\Http\Controllers\MessageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AnggotaController;

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
Route::get('/get-user-kontak/{id}', [DaftarPjController::class, 'getKontakUser']);

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

Route::get('/dashboard', [AnggotaController::class, 'jumlahAnggota'])
    ->name('dashboard')
    ->middleware('auth');


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
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');

// Rute untuk menampilkan halaman edit profil
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit')->middleware('auth');

// Rute untuk mengupdate data profil setelah disubmit
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');
Route::get('/profile/{id}', [UserController::class, 'showProfileuser'])->name('show.profil')->middleware('auth');

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

Route::middleware('auth')->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});
Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::post('/messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Email verifikasi sudah dikirim ulang!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // tandai sebagai verified
    return redirect('/dashboard'); // arahkan kembali ke akun
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/npa-approval', [AnggotaController::class, 'showNpaApproval'])->name('admin.npa.approval');
    Route::post('/admin/npa-approve/{user}', [AnggotaController::class, 'approveNpa'])->name('admin.npa.approve');
    Route::post('/admin/npa-reject/{user}', [AnggotaController::class, 'rejectNpa'])->name('admin.npa.reject');
});















//dashboar admin terpisah
Route::view('/admin-panel', 'admin.indexpanel')->name('admin.indexpanel.base');
Route::any('/admin-panel/{any}', fn () => view('admin.indexpanel'))->where('any', '.*')->name('admin.indexpanel');
