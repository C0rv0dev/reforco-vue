<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('showProducts');
Route::get('/products/{product}/notes', [ProductController::class, 'notes'])->name('showNotes');

Route::post('/products', [ProductController::class, 'store'])->name('storeProducts');
Route::post('/products/{product}/notes', [NoteController::class, 'store'])->name('storeNotes');

Route::put('/products/{product}', [ProductController::class, 'update'])->name('updateProduct');
Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('deleteProduct');