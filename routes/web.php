<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

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

Route::get('/signin',[userController::class,'signin']);
Route::get('/signup',[userController::class,'signup']);

Route::post('/signin',[userController::class,'do_signin'])->name('signin');
Route::post('/signup',[userController::class,'do_signup'])->name('signup');


