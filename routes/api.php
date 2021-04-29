<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('user', \App\Http\Controllers\api\UserController::class)->only([
    'index', 'show'
]);
Route::get('emails', [\App\Http\Controllers\api\EmailController::class,'index']);