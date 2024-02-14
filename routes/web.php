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
Route::get('/publication/{post}', [BlogController::class, 'show'])->name('post.show');
Route::delete('/publication/{post}/delete', [BlogController::class, 'destroy'])->middleware('auth')->name('post.delete');
Route::get('/publication/{post}/modify', [BlogController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::put('/publication/{post}/modify', [BlogController::class, 'update'])->middleware('auth')->name('post.update');



Route::get('/inscription',[AuthController::class, 'showRegister'])->name('auth.register')->middleware('guest');
Route::post('/inscription',[AuthController::class, 'register']);

Route::get('/connexion',[AuthController::class, 'showLogin'])->name('auth.login')->middleware('guest');
Route::post('/connexion',[AuthController::class, 'login']);

Route::delete('/', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

