<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
Route::get('/emails', [App\Http\Controllers\HomeController::class, 'emails'])->middleware('auth');
Route::post('/emails', [App\Http\Controllers\HomeController::class, 'emails_store'])->middleware('auth');

Auth::routes(['register' => false]);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'showAdminLoginForm'])->name('admin.login');
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class,'adminLogin']);

Route::get('/admin/users', [App\Http\Controllers\admin\UserController::class, 'index'])->name('home');
Route::post('/admin/users', [App\Http\Controllers\admin\UserController::class, 'store']);
Route::put('/admin/users', [App\Http\Controllers\admin\UserController::class, 'update']);
Route::delete('/admin/users', [App\Http\Controllers\admin\UserController::class, 'delete']);
