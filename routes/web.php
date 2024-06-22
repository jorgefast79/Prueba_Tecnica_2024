<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\LoginController;

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


Route::view('/', 'home')->name('home')->middleware('auth');
Route::view('/about', 'about')->name('about')->middleware('auth');
Route::get('/users', [UsersController::class, 'index'])->name('users')->middleware('auth');
Route::post('/users', [UsersController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create')->middleware('auth');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update')->middleware('auth');
Route::view('/contact', 'contact')->name('contact')->middleware('auth');
Auth::routes(['register' => false]);
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::get('/users/search',[UsersController::class, 'search'])->name('users.search');
Route::get('/users/show',[UsersController::class, 'show'])->name('users.show');