<?php

use App\Http\Controllers\eventController;
use App\Http\Controllers\panitiaController;
use App\Http\Controllers\bukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JoinController;
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

Route::get('/', [eventController::class, 'index'])->middleware('auth');
Route::get('event', [eventController::class, 'index'])->name('event.index')->middleware('auth');
Route::get('event/add', [eventController::class, 'create'])->name('event.create')->middleware('auth');
Route::post('event/store', [eventController::class, 'store'])->name('event.store')->middleware('auth');
Route::get('event/edit/{id}', [eventController::class, 'edit'])->name('event.edit')->middleware('auth');
Route::post('event/update/{id}', [eventController::class, 'update'])->name('event.update')->middleware('auth');
Route::get('event/show/{id}', [eventController::class, 'show'])->name('event.show')->middleware('auth');
Route::delete('event/delete/{id}', [eventController::class, 'softDelete'])->name('event.softDelete')->middleware('auth');
Route::delete('event/delete/permanen/{id}', [eventController::class, 'hardDelete'])->name('event.hardDelete')->middleware('auth');
Route::get('event/restore/{id}', [eventController::class, 'restore'])->name('event.restore')->middleware('auth');

Route::get('/buku', [bukuController::class, 'index'])->name('buku.index');
Route::get('/buku/add', [bukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [bukuController::class, 'store'])->name('buku.store');
Route::get('/buku/edit/{id}', [bukuController::class, 'edit'])->name('buku.edit');
Route::post('/buku/update/{id}', [bukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/delete/{id}', [bukuController::class, 'delete'])->name('buku.delete');

//Route::view('/login', 'login.index');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [eventController::class, 'index'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
//Route::view('/buku', 'buku.index');

Route::get('/detail', [JoinController::class, 'index'])->name('join.index');
Route::get('/soft', [eventController::class, 'softIndex'])->name('softDelete');
Route::get('/restore', [eventController::class, 'softIndex'])->name('restore');

Route::get('/join', [joinController::class, 'index'])->name('join');

Route::get('/panitia', [panitiaController::class, 'index'])->name('panitia.index');
Route::get('/panitia/add', [panitiaController::class, 'create'])->name('panitia.create');
Route::post('/panitia/store', [panitiaController::class, 'store'])->name('panitia.store');
Route::get('/panitia/edit/{id}', [panitiaController::class, 'edit'])->name('panitia.edit');
Route::post('/panitia/update/{id}', [panitiaController::class, 'update'])->name('panitia.update');
Route::delete('/panitia/delete/{id}', [panitiaController::class, 'delete'])->name('panitia.delete');