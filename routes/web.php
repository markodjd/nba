<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayersController;
use App\Http\Controllers\TeamsController;
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

Route::get('/', [TeamsController::class, 'index'])->name('teams');

Route::get('/teams/{team}', [TeamsController::class, 'show'])->name('team');

Route::get('/players/{player}', [PlayersController::class, 'show'])->name('player');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'get_register_form']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'get_login_form']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
