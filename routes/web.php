<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PostInfaqController;
use App\Http\Controllers\CountInfaqController;
use App\Http\Controllers\CountZakatController;
use App\Http\Controllers\CountQurbanController;
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

        // Count Qurban
        Route::get(
            '/count-qurban/create',
            [CountQurbanController::class, 'create']
        )->name(
            'countQurban.create'
        );
        Route::post(
            '/count-qurban',
            [CountQurbanController::class, 'store']
        )->name(
            'countQurban.store'
        );
        Route::delete(
            '/count-qurban/{countQurban}',
            [CountQurbanController::class, 'destroy']
        )->name(
            'countQurban.destroy'
        );

        // Post Infaq
        Route::get(
            '/post-infaq',
            [PostInfaqController::class, 'index']
        )->name(
            'postInfaq.index'
        );
        Route::get(
            '/post-infaq/create',
            [PostInfaqController::class, 'create']
        )->name(
            'postInfaq.create'
        );
        Route::post(
            '/post-infaq',
            [PostInfaqController::class, 'store']
        )->name(
            'postInfaq.store'
        );
        Route::get(
            '/post-infaq/{postInfaq}',
            [PostInfaqController::class, 'show']
        )->name(
            'postInfaq.show'
        );
        Route::get(
            '/post-infaq/{postInfaq}/edit',
            [PostInfaqController::class, 'edit']
        )->name(
            'postInfaq.edit'
        );
        Route::put(
            '/post-infaq/{postInfaq}',
            [PostInfaqController::class, 'update']
        )->name(
            'postInfaq.update'
        );
        Route::patch(
            '/post-infaq/{postInfaq}',
            [PostInfaqController::class, 'update']
        )->name(
            'postInfaq.update'
        );
        Route::delete(
            '/post-infaq/{postInfaq}',
            [PostInfaqController::class, 'destroy']
        )->name(
            'postInfaq.destroy'
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

        // Count Qurban
        Route::get(
            '/count-qurban',
            [CountQurbanController::class, 'index']
        )->name(
            'countQurban.index'
        );
        Route::get(
            '/count-qurban/{countQurban}',
            [CountQurbanController::class, 'show']
        )->name(
            'countQurban.show'
        );


    });