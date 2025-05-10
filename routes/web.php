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
use App\Http\Controllers\CardapioController;

Route::get('/admin', [AuthController::class, 'adminEntryPoint'])->name('admin.index');

Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/painel', function () {
        return view('admin.painel');
    });


    Route::get('/cadastro', [CardapioController::class, 'create'])->name('admin.cadastro');
    Route::post('/store', [CardapioController::class, 'store'])->name('admin.store');
    Route::get('/cardapio_admin', [CardapioController::class, 'index'])->name('admin.cardapio');
    Route::get('/cardapio_admin/editar/{id}', [CardapioController::class, 'edit'])->name('admin.cardapio.edit');
    Route::put('/cardapio_admin/{id}', [CardapioController::class, 'update'])->name('admin.cardapio.update');
    Route::delete('/cardapio_admin/{id}', [CardapioController::class, 'destroy'])->name('admin.cardapio.destroy');
});
