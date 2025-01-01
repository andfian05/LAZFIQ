<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CountInfaqController;
use App\Http\Controllers\CountZakatController;
use App\Http\Middleware\AdminOrAuditMiddleware;



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



Route::middleware(['auth', AdminMiddleware::class])
    ->group(function () {
        // Count Infaq
        Route::get(
            '/count-infaq/create',
            [CountInfaqController::class, 'create']
        )->name(
            'countInfaq.create'
        );
        Route::post(
            '/count-infaq',
            [CountInfaqController::class, 'store']
        )->name(
            'countInfaq.store'
        );
        Route::delete(
            '/count-infaq/{countInfaq}',
            [CountInfaqController::class, 'destroy']
        )->name(
            'countInfaq.destroy'
        );

        // Count Zakat
        Route::get(
            '/count-zakat/create',
            [CountZakatController::class, 'create']
        )->name(
            'countZakat.create'
        );
        Route::post(
            '/count-zakat',
            [CountZakatController::class, 'store']
        )->name(
            'countZakat.store'
        );
        Route::delete(
            '/count-zakat/{countZakat}',
            [CountZakatController::class, 'destroy']
        )->name(
            'countZakat.destroy'
        );

        
    });



Route::middleware(['auth', AdminOrAuditMiddleware::class])
    ->group(function () {
        // Count Infaq
        Route::get(
            '/count-infaq',
            [CountInfaqController::class, 'index']
        )->name(
            'countInfaq.index'
        );
        Route::get(
            '/count-infaq/{countInfaq}',
            [CountInfaqController::class, 'show']
        )->name(
            'countInfaq.show'
        );

        // Count Zakat
        Route::get(
            '/count-zakat',
            [CountZakatController::class, 'index']
        )->name(
            'countZakat.index'
        );
        Route::get(
            '/count-zakat/{countZakat}',
            [CountZakatController::class, 'show']
        )->name(
            'countZakat.show'
        );

        
    });