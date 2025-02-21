<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\auth\middleware\authenticate;;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);