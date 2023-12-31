<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/post', PostController::class);
Route::post('post/create',[PostController::class,'create']);
Route::post('post/store',[PostController::class,'store']);
Route::get('delete/{id}',[PostController::class,'destroy']);
Route::post('post/{id}/edit',[PostController::class,'edit']);

