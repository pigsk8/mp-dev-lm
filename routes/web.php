<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'home'])->name('home');
Route::get('/producto/{id}', [ProductController::class, 'producto'])->name('producto');
Route::get('/exitoso', [ProductController::class, 'exitoso'])->name('exitoso');
Route::get('/pendiente', [ProductController::class, 'pendiente'])->name('pendiente');
Route::get('/rechazado', [ProductController::class, 'rechazado'])->name('rechazado');

