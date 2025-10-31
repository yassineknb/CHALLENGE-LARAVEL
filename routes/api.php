<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EduBlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// PostController CRUD routes
Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::put('/posts/{id}', [PostController::class, 'update']);
Route::delete('/posts/{id}', [PostController::class, 'destroy']);

// EduBlogController routes
Route::get('/edublog/users', [EduBlogController::class, 'getUsers']); // Users + profile + posts + tags + comments
Route::get('/edublog/posts', [EduBlogController::class, 'getPosts']);  // Posts + tags + comments
Route::post('/edublog/posts/{id}/tags', [EduBlogController::class, 'attachTag']);
Route::post('/edublog/posts/{id}/comments', [EduBlogController::class, 'addComment']);
