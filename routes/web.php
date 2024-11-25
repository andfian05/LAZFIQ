<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


//pembaca
Route::get('/', function () {
    return view('tampilan');
});

Route::get('/lazfiq/sedekah', function () {
    return view('pembaca.laporan.infaq');
});

Route::get('/lazfiq/zakat', function () {
    return view('pembaca.laporan.zakat');
});

Route::get('/lazfiq/qurban', function () {
    return view('pembaca.laporan.qurban');
});

//admin
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


//login
Route::get('/login', function () {
    return view('admin.auth.login');
});

Route::get('/registrasi', function () {
    return view('admin.auth.registrasi');
});



Route::get('/form_infaq', function () {
    return view('admin.infaq.infaq');
});

Route::get('/tambah_infaq', function () {
    return view('admin.infaq.tambah_infaq');
});

Route::get('/detail_infaq', function () {
    return view('admin.infaq.detail_infaq');
});

Route::get('/update_infaq', function () {
    return view('admin.infaq.update_infaq');
});



Route::get('/form_qurban', function () {
    return view('admin.qurban.qurban');
});

Route::get('/cek_qurban', function () {
    return view('admin.perhitungan.th_qurban');

});

Route::get('/detail_cek_qurban', function () {
    return view('admin.perhitungan.detail_th_qurban');
});

Route::get('/detail_qurban', function () {
    return view('admin.qurban.detail_qurban');
});

Route::get('/update_qurban', function () {
    return view('admin.qurban.update_qurban');
});

Route::get('/tambah_qurban', function () {
    return view('admin.qurban.tambah_qurban');
});



Route::get('/form_zakat', function () {
    return view('admin.zakat.zakat');
});

Route::get('/cek_zakat', function () {
    return view('admin.perhitungan.th_zakat');
});

Route::get('/detail_cek_zakat', function () {
    return view('admin.perhitungan.detail_th_zakat');
});

Route::get('/tambah_zakat', function () {
    return view('admin.zakat.tambah_zakat');
});

Route::get('/update_zakat', function () {
    return view('admin.zakat.update_zakat');
});

Route::get('/detail_zakat', function () {
    return view('admin.zakat.detail_zakat');
});


Route::get('/upload', function () {
    return view('admin.dokumentasi.dokumen_upload');
});


//perhitungan
Route::get('/hitung_infaq', function () {
    return view('admin.perhitungan.perhitungan_infaq');
});

Route::get('/cek_infaq', function () {
    return view('admin.perhitungan.th_infaq');
});

Route::get('/detail_cek_infaq', function () {
    return view('admin.perhitungan.detail_th_infaq');
});


Route::get('/hitung_zakat', function () {
    return view('admin.perhitungan.perhitungan_zakat');
});

Route::get('/hitung_qurban', function () {
    return view('admin.perhitungan.perhitungan_qurban');
});