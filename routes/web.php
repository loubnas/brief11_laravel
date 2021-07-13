<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\CommentaireController::class,'index']);
route::resource('film','App\Http\Controllers\FilmController');
route::resource('commentaire','App\Http\Controllers\CommentaireController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\CommentaireController::class, 'index']);
