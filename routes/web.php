<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\HallgatoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DatabaseViewController;

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

Route::redirect('/crud', '/hallgato');
Route::resource('/hallgato', HallgatoController::class, ['except' => ['destroy', 'update']]);
Route::get('hallgato/{id}/destroy', [HallgatoController::class, 'destroy']);
Route::put('hallgato/{id}/update', [HallgatoController::class, 'update']);

Route::get('/contact', [ContactController::class, 'show']);
Route::post('/contact', [ContactController::class, 'store']);

Route::get('/database', [DatabaseViewController::class, 'index']);
