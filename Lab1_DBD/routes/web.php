<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PlaylistController;
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
use App\Http\Controllers\MethodController;
use App\Http\Controllers\FunctionalityRoleController;
use App\Http\Controllers\SongPlaylistController;
use App\Http\Controllers\FollowupController;

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
    return view('inicio');
});

Route::get('/escucha', function () {
    return view('escucha');
});
//GENRES
Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::post('/genres/create', [GenreController::class, 'store']);
Route::put('/genres/update/{id}', [GenreController::class, 'update']);
Route::delete('/genres/delete/{id}', [GenreController::class, 'destroy']);
//BANKS
Route::get('/banks', [BankController::class, 'index']);
Route::post('/banks/create', [BankController::class, 'store']);
Route::get('/banks/{id}', [BankController::class, 'show']);
Route::put('/banks/update/{id}', [BankController::class, 'update']);
Route::delete('/banks/delete/{id}', [BankController::class, 'destroy']);
//PLAYLIST
Route::get('/playlist', [PlaylistController::class, 'index']);
Route::post('/playlist/create', [PlaylistController::class, 'store']);
Route::put('/playlist/update/{id}', [PlaylistController::class, 'update']);
Route::delete('/playlist/delete/{id}', [PlaylistController::class, 'destroy']);
//FUNCIONALITY
Route::get('/funcionalities', [FuncionalityController::class, 'index']);
//CARD TYPES
Route::get('/card_types', [Card_TypeController::class, 'index']);
Route::get('/card_types/{id}', [Card_TypeController::class, 'show']);
Route::post('/card_types/create', [Card_TypeController::class, 'store']);
Route::put('/card_types/update/{id}', [Card_TypeController::class, 'update']);
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
Route::put('/users/update/{id}', [UserController::class, 'update']);
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
Route::put('/songs/update/{id}', [SongController::class, 'update']);
Route::delete('/songs/destroy/{id}', [SongController::class, 'destroy']);
Route::get('/songs/restore/{id}', [SongController::class, 'restore']);
//AUTENTICACIONES
Route::get('/authentications', [AuthenticationController::class, 'index']);
Route::get('/authentications/{id}', [AuthenticationController::class, 'show']);
Route::post('/authentications/create', [AuthenticationController::class, 'store']);
Route::put('/authentications/update/{id}', [AuthenticationController::class, 'update']);
Route::delete('/authentications/destroy/{id}', [AuthenticationController::class, 'destroy']);
Route::get('/authentications/restore/{id}', [AuthenticationController::class, 'restore']);
//CALIFICACIONES
Route::get('/ratings', [RatingController::class, 'index']);
Route::get('/ratings/{id}', [RatingController::class, 'show']);
Route::post('/ratings/create', [RatingController::class, 'store']);
Route::put('/rating/update/{id}', [RatingController::class, 'update']);
Route::delete('/rating/destroy/{id}', [RatingController::class, 'destroy']);
Route::get('/rating/restore/{id}', [RatingController::class, 'restore']);
//METODOS DE PAGO
Route::get('/methods', [MethodController::class, 'index']);
Route::get('/methods/{id}', [MethodController::class, 'show']);
Route::post('/methods/create', [MethodController::class, 'store']);
Route::post('/methods/update/{id}', [MethodController::class, 'update']);
Route::delete('/methods/destroy/{id}', [MethodController::class, 'destroy']);
// Functionality - roles
Route::get('/functionalityrole', [FunctionalityRoleController::class, 'index']);
Route::get('/functionalityrole/{id}', [FunctionalityRoleController::class, 'show']);
Route::post('/functionalityrole/create', [FunctionalityRoleController::class, 'store']);
Route::put('/functionalityrole/update/{id}', [FunctionalityRoleController::class, 'update']);
Route::delete('/functionalityrole/delete/{id}', [FunctionalityRoleController::class, 'destroy']);
// Song - Playlist
Route::get('/songplaylist', [SongPlaylistController::class, 'index']);
Route::get('/songplaylist/{id}', [SongPlaylistController::class, 'show']);
Route::post('/songplaylist/create', [SongPlaylistController::class, 'store']);
Route::put('/songplaylist/update/{id}', [SongPlaylistController::class, 'update']);
Route::delete('/songplaylist/delete/{id}', [SongPlaylistController::class, 'destroy']);
//FOLLOWUP
Route::get('/followups', [FollowupController::class, 'index']);
Route::get('/followups/{id}', [FollowupController::class, 'show']);
Route::post('/followups/create', [FollowupController::class, 'store']);
Route::put('/followups/update/{id}', [FollowupController::class, 'update']);
Route::delete('/followups/destroy/{id}', [FollowupController::class, 'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
