<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;
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

Route::get('/', [BlogController::class, 'index'])->name('blog.index');
Route::get('/publication/create', [BlogController::class, 'create'])->name('post.create')->middleware('auth');
Route::post('/publication/create', [BlogController::class, 'store'])->middleware('auth');



Route::get('/inscription',[AuthController::class, 'showRegister'])->name('auth.register')->middleware('guest');
Route::post('/inscription',[AuthController::class, 'register']);

Route::get('/connexion',[AuthController::class, 'showLogin'])->name('auth.login')->middleware('guest');
Route::post('/connexion',[AuthController::class, 'login']);

Route::delete('/', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

