<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Admin

Auth::routes();

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::delete('/messages/delete/{id}', [App\Http\Controllers\AdminController::class, 'adminDeleteMessage'])->name('admin.message.delete');
    Route::get('/messages/show/{id}', [App\Http\Controllers\AdminController::class, 'showMessage'])->name('message.show');
    Route::post('/messages/reply/{id}', [App\Http\Controllers\AdminController::class, 'adminReply'])->name('message.reply');

 });

 // User

 Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
 Route::post('/messages/store', [App\Http\Controllers\MessageController::class, 'store'])->name('message.store');
 Route::delete('/messages/delete/{user_id}/{id}', [App\Http\Controllers\MessageController::class, 'deleteMessage'])->name('message.delete');
 Route::get('/messages/edit/{id}', [App\Http\Controllers\MessageController::class, 'edit'])->name('message.edit');
 Route::post('/messages/update/{id}', [App\Http\Controllers\MessageController::class, 'update'])->name('message.update');