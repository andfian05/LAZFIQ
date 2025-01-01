<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\PostInfaqController;
use App\Http\Controllers\PostZakatController;
use App\Http\Controllers\CountInfaqController;
use App\Http\Controllers\CountZakatController;
use App\Http\Controllers\PostQurbanController;
use App\Http\Controllers\CountQurbanController;
use App\Http\Middleware\AdminOrAuditMiddleware;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\LandingController;



// Main Landing Page
Route::get(
    '/',
    [LandingController::class, 'index']
);


// Authentication Users and Features for Users after Authentication
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

        // Excel Export for Post Infaq
        Route::get(
            '/post-infaq-exportExcel',
            [PostInfaqController::class, 'exportExcel']
        )->name(
            'postInfaq.exportExcel'
        );

        // Post Zakat
        Route::get(
            '/post-zakat',
            [PostZakatController::class, 'index']
        )->name(
            'postZakat.index'
        );
        Route::get(
            '/post-zakat/create',
            [PostZakatController::class, 'create']
        )->name(
            'postZakat.create'
        );
        Route::post(
            '/post-zakat',
            [PostZakatController::class, 'store']
        )->name(
            'postZakat.store'
        );
        Route::get(
            '/post-zakat/{postZakat}',
            [PostZakatController::class, 'show']
        )->name(
            'postZakat.show'
        );
        Route::get(
            '/post-zakat/{postZakat}/edit',
            [PostZakatController::class, 'edit']
        )->name(
            'postZakat.edit'
        );
        Route::put(
            '/post-zakat/{postZakat}',
            [PostZakatController::class, 'update']
        )->name(
            'postZakat.update'
        );
        Route::patch(
            '/post-zakat/{postZakat}',
            [PostZakatController::class, 'update']
        )->name(
            'postZakat.update'
        );
        Route::delete(
            '/post-zakat/{postZakat}',
            [PostZakatController::class, 'destroy']
        )->name(
            'postZakat.destroy'
        );

        // Excel Export for Post Zakat
        Route::get(
            '/post-zakat-exportExcel',
            [PostZakatController::class, 'exportExcel']
        )->name(
            'postZakat.exportExcel'
        );

        // Post Qurban
        Route::get(
            '/post-qurban',
            [PostQurbanController::class, 'index']
        )->name(
            'postQurban.index'
        );
        Route::get(
            '/post-qurban/create',
            [PostQurbanController::class, 'create']
        )->name(
            'postQurban.create'
        );
        Route::post(
            '/post-qurban',
            [PostQurbanController::class, 'store']
        )->name(
            'postQurban.store'
        );
        Route::get(
            '/post-qurban/{postQurban}',
            [PostQurbanController::class, 'show']
        )->name(
            'postQurban.show'
        );
        Route::get(
            '/post-qurban/{postQurban}/edit',
            [PostQurbanController::class, 'edit']
        )->name(
            'postQurban.edit'
        );
        Route::put(
            '/post-qurban/{postQurban}',
            [PostQurbanController::class, 'update']
        )->name(
            'postQurban.update'
        );
        Route::patch(
            '/post-qurban/{postQurban}',
            [PostQurbanController::class, 'update']
        )->name(
            'postQurban.update'
        );
        Route::delete(
            '/post-qurban/{postQurban}',
            [PostQurbanController::class, 'destroy']
        )->name(
            'postQurban.destroy'
        );

        // Excel Export for Post Qurban
        Route::get(
            '/post-qurban-exportExcel',
            [PostQurbanController::class, 'exportExcel']
        )->name(
            'postQurban.exportExcel'
        );

        // Documentation
        Route::get(
            '/documentation',
            [DocumentationController::class, 'index']
        )->name(
            'documentation.index'
        );
        Route::get(
            '/documentation/create',
            [DocumentationController::class, 'create']
        )->name(
            'documentation.create'
        );
        Route::post(
            '/documentation',
            [DocumentationController::class, 'store']
        )->name(
            'documentation.store'
        );
        Route::get(
            '/documentation/{documentation}',
            [DocumentationController::class, 'show']
        )->name(
            'documentation.show'
        );
        Route::get(
            '/documentation/{documentation}/edit',
            [DocumentationController::class, 'edit']
        )->name(
            'documentation.edit'
        );
        Route::put(
            '/documentation/{documentation}',
            [DocumentationController::class, 'update']
        )->name(
            'documentation.update'
        );
        Route::patch(
            '/documentation/{documentation}',
            [DocumentationController::class, 'update']
        )->name(
            'documentation.update'
        );
        Route::delete(
            '/documentation/{documentation}',
            [DocumentationController::class, 'destroy']
        )->name(
            'documentation.destroy'
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
