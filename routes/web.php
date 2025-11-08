<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\DatabaseCRUDController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return view('admin');
    }
    abort(403);
})->name('admin');

Route::get('/chart', [ChartController::class, 'showChart']);

Route::get('/messages', [MessagesController::class, 'showMessages'])->name('messages');

Route::post('/crud_create', [DatabaseCRUDController::class, 'create']);
Route::get('/crud_read', [DatabaseCRUDController::class, 'read']);
Route::put('/crud_update', [DatabaseCRUDController::class, 'update']);
Route::delete('/crud_delete', [DatabaseCRUDController::class, 'delete']);
