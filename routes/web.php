<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/signin', [HomeController::class, 'signin'])->name('login');
Route::post('/login', [AuthController::class, 'customLogin'])->name('signin');
Route::get('/signup', [App\Http\Controllers\HomeController::class, 'signup'])->name('signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/department', [App\Http\Controllers\HomeController::class, 'department'])->name('department');
    Route::post('/add-department', [DepartmentController::class, 'addDepartment'])->name('add.department');
    Route::get('/add-department', [DepartmentController::class, 'addDepartmentView'])->name('department.view');
    Route::get('/ticket', [App\Http\Controllers\HomeController::class, 'ticket'])->name('ticket');
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
    Route::post('/add-user', [UserController::class, 'addUser'])->name('add.user');
    Route::get('/add-user', [UserController::class, 'addUserView'])->name('user.view');
});
