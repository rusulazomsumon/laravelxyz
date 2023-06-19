<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//1. get all api url
Route::get('posts',[PostController::class, 'index']);

//2. creating news post using api
Route::post('posts',[PostController::class, 'store']);

//3. showing single post
Route::get('posts/{post}',[PostController::class, 'show']);

//4. for edit / update post , we can use put/patch
Route::put('posts/{post}',[PostController::class, 'update']);

//5. for edit / delete post 
Route::delete('posts/{post}',[PostController::class, 'destroy']);


// এই url গুলোর বদলে আমারা ব্যাবহার করতে পারি defoult এটা (সব api দেখতে php artisan route:list)
// Route::apiResource('posts',[PostController::class]);
