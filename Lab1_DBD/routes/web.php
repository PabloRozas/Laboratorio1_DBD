<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\Card_TypeController;
use App\Http\Controllers\FuncionalityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RatingController;
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

Route::get('/', function () {
    return view('welcome');
});
//GENRES
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::post('/genres/create', [GenreController::class, 'store']);
Route::get('/genres/update/{id}', [GenreController::class, 'update']);
Route::delete('/genres/delete/{id}', [GenreController::class, 'destroy']);
//BANKS
Route::get('/banks', [BankController::class, 'index']);
Route::post('/banks/create', [BankController::class, 'store']);
Route::get('/banks/{id}', [BankController::class, 'show']);
Route::put('/banks/update/{id}', [BankController::class, 'update']);
Route::delete('/banks/delete/{id}', [BankController::class, 'destroy']);
//FUNCIONALITY
Route::get('/funcionalities', [FuncionalityController::class, 'index']);
//CARD TYPES
Route::get('/card_types', [Card_TypeController::class, 'index']);
Route::get('/card_types/{id}', [Card_TypeController::class, 'show']);
Route::post('/card_types/create', [Card_TypeController::class, 'store']);
Route::get('/card_types/update/{id}', [Card_TypeController::class, 'update']);
Route::get('/card_types/destroy/{id}', [Card_TypeController::class, 'destroy']);
//ALBUMS
Route::get('/albums', [AlbumController::class, 'index']);
Route::post('/albums/create', [AlbumController::class, 'store']);
Route::get('/albums/{id}', [AlbumController::class, 'show']);
Route::put('/albums/update/{id}', [AlbumController::class, 'update']);
Route::delete('/albums/delete/{id}', [AlbumController::class, 'destroy']);
//USERS
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users/create', [UserController::class, 'store']);
Route::post('/users/update/{id}', [UserController::class, 'update']);
Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
Route::get('/users/restore/{id}', [UserController::class, 'restore']);
//ROLES
Route::get('/roles', [RoleController::class, 'index']);
Route::get('/roles/{id}', [RoleController::class, 'show']);
Route::post('/roles/create', [RoleController::class, 'store']);
Route::put('/roles/update/{id}', [RoleController::class, 'update']);
Route::delete('/roles/destroy/{id}', [RoleController::class, 'destroy']);
//LOCACIONES
Route::get('/location', [LocationController::class, 'index']);
Route::get('/location/{id}', [LocationController::class, 'show']);
Route::post('/location/create', [LocationController::class, 'store']);
Route::put('/location/update/{id}', [LocationController::class, 'update']);
Route::delete('/location/destroy/{id}', [LocationController::class, 'destroy']);
//CANCIONES
Route::get('/songs', [SongController::class, 'index']);
Route::get('/songs/{id}', [SongController::class, 'show']);
Route::post('/songs/create', [SongController::class, 'store']);
//AUTENTICACIONES
Route::get('/authentications', [AuthenticationController::class, 'index']);
Route::get('/authentications/{id}', [AuthenticationController::class, 'show']);
//CALIFICACIONES
Route::get('/ratings', [RatingController::class, 'index']);
Route::get('/ratings/{id}', [RatingController::class, 'show']);