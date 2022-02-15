<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

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
Route::get('/welcome', function () {
    return 'Hello World';
});

Route::get('/', [GamesController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [GamesController::class, 'show'])->name('games.show');



// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/show', function () {
//     return view('show');
// });

