<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Website'], function() {

    //route yang perlu auth
    Route::group(['middleware' => 'auth'], function() {
        //show layanan bimbingan karir
        Route::get('/layanan/bimbingan-karir', 'BimbinganKarirController')->name('bimbingan-karir');
        // show layanan info lowongan
        Route::get('/layanan/info-lowongan', 'InfoLowonganController')->name('info-lowongan');

    });
});