<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// POSTS
Route::apiResource('/v1/posts', App\Http\Controllers\Api\v1\PostController::class);
