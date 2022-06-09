<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BankController;

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

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/genres/{id}', [GenreController::class, 'show']);
Route::post('/genres/create', [GenreController::class, 'store']);
Route::get('/genres/update/{id}', [GenreController::class, 'update']);
Route::get('/banks', [BankController::class, 'index']);
Route::get('/genres/delete/{id}', [GenreController::class, 'destroy']);
Route::post('/banks/create', [BankController::class,'store']);
Route::get('/banks/{id}', [BankController::class,'show']);
Route::get('/banks', [BankController::class,'index']);