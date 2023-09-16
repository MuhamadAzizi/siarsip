<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomingMailController;
use App\Http\Controllers\OutgoingMailController;
use App\Http\Controllers\UserController;

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
})->name('home');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'auth'])->name('login.auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');

Route::resource('/surat-masuk', IncomingMailController::class)->except(['show'])->middleware('auth');
Route::get('/surat-masuk/pdf', [IncomingMailController::class, 'pdf'])->name('surat-masuk.pdf')->middleware('auth');
Route::resource('/surat-keluar', OutgoingMailController::class)->except(['show'])->middleware('auth');
Route::get('/surat-keluar/pdf', [OutgoingMailController::class, 'pdf'])->name('surat-keluar.pdf')->middleware('auth');
