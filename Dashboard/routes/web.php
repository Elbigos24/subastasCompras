<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControler;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubastaController;
use App\Http\Controllers\PujaController;
use App\Http\Controllers\CompraController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard principal
Route::get('/dashboard', [AdminControler::class, 'index'])->name('dashboard');

// CRUDs de recursos
Route::resource('products',  ProductController::class);
Route::resource('subastas',  SubastaController::class);
Route::resource('pujas',     PujaController::class);
Route::resource('compras',   CompraController::class);
