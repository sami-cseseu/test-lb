<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [UserController::class, 'create'])->name('user.create');
Route::get('/users', [UserController::class, 'index'])->name('user.group');
Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
Route::get('/users/delete', [UserController::class, 'deleteFrankfurtUsers'])->name('user.delete');
Route::get('/success', [UserController::class, 'success'])->name('user.store.success');

