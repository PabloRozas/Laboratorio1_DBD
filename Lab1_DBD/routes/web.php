<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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
Route::get('/genres/delete/{id}', [GenreController::class, 'destroy']);
//BANKS
Route::get('/banks', [BankController::class, 'index']);
Route::post('/banks/create', [BankController::class,'store']);
Route::get('/banks/{id}', [BankController::class,'show']);
Route::get('/banks', [BankController::class,'index']);
//USERS
Route::get('/users', [UserController::class,'index']);
//ROLES
Route::get('/roles', [RoleController::class,'index']);
Route::get('/roles/{id}', [RoleController::class,'show']);
Route::post('/roles/create', [RoleController::class,'store']);
Route::put('/roles/update/{id}', [RoleController::class,'update']);
Route::delete('/roles/destroy/{id}', [RoleController::class,'destroy']);