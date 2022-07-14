<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/signin', [HomeController::class, 'signin'])->name('signin');
Route::get('/signup', [App\Http\Controllers\HomeController::class, 'signup'])->name('signup');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/department', [App\Http\Controllers\HomeController::class, 'department'])->name('department');
Route::get('/ticket', [App\Http\Controllers\HomeController::class, 'ticket'])->name('ticket');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');