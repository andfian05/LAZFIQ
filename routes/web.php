<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('tampilan');
});



Auth::routes();

Route::get(
    '/dashboard',
    [HomeController::class, 'index']
)->name(
    'home'
);
