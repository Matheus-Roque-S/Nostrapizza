<?php

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



Route::get('/', '\App\Http\Controllers\CardapioController@puxarcardapio');


use App\Http\Controllers\AuthController;

Route::get('/admin', [AuthController::class, 'adminEntryPoint'])->name('admin.index');

Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/painel', function () {
        return view('admin.painel');
    });
});

