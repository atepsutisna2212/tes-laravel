<?php

use App\Http\Controllers\CGlobal;
use App\Http\Controllers\CDaftar;
use App\Http\Controllers\CPengguna;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [CGlobal::class, 'index'])->name('index')->middleware('guest');
Route::get('/login', [CGlobal::class, 'login'])->name('login')->middleware('guest');

Route::get('/registrasi', [CGlobal::class, 'Registrasi']);
Route::post('/registrasi', [CGlobal::class, 'saveRegistrasi']);

Route::post('/login', [CGlobal::class, 'authenticate']);
Route::get('/dashboard', [CGlobal::class, 'dashboard'])->middleware('auth');
Route::resource('/pengguna', CPengguna::class)->middleware('admin')->except('show');
Route::resource('/daftar', CDaftar::class)->middleware('auth')->except('show');

Route::post('/logout', [CGlobal::class, 'logout']);
Route::get('/checkIn/{id}', [CDaftar::class, 'checkIn'])->middleware('admin');
Route::get('/print/{id}', [CDaftar::class, 'print'])->middleware('auth');
Route::get('/dataCek', [CDaftar::class, 'dataCek'])->middleware('admin');
