<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminControler;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [AdminControler::class, 'index']);
