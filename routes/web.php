<?php

use App\Http\Controllers\MessageController;
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

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('/messages', [AdminController::class, 'adminGetAllMessages'])->name('admin.messages.index');
    Route::delete('/messages/delete/{id}', [AdminController::class, 'adminDeleteMessage'])->name('admin.message.delete');
    Route::post('/messages/reply/{id}', [MessageController::class, 'adminReply'])->name('admin.messages.reply');
});


// User

Route::get('/messages/{user_id}', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
Route::post('/messages/store', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::get('/messages/edit/{id}/{user_id}', [MessageController::class, 'edit'])->name('messages.edit');
Route::post('/messages/update/{id}/{user_id}', [MessageController::class, 'update'])->name('messages.update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
