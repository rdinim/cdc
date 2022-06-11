<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'auth.admin']], function () {
    /*------------------LAYANAN--------------------*/

    /*BIMBINGAN KARIR*/
    Route::group(['namespace' => 'Admin\Layanan\BimbinganKarir', 'prefix' => '/admin/layanan/bimbingan-karir'], function() {
        // show list bimbingan karir
        Route::get('/list', 'ShowListBimbinganKarirController')->name('list-bimbingan-karir');
        // show form create bimbingan karir
        Route::get('/form-create', 'ShowFormCreateBimbinganKarirController')->name('form-create-bimbingan-karir');
        // create new bimbingan karir
        Route::post('/create', 'CreateBimbinganKarirController')->name('create-bimbingan-karir');
        // show form update bimbingan karir
        Route::get('/form-update/{bimbingan_karir}', 'ShowFormUpdateBimbinganKarirController')->name('form-update-bimbingan-karir');
        // update bimbingan karir
        Route::put('/update/{bimbingan_karir}', 'UpdateBimbinganKarirController')->name('update-bimbingan-karir');
        //delete bimbingan karir
        Route::delete('/delete/{bimbingan_karir}', 'DeleteBimbinganKarirController')->name('delete-bimbingan-karir');
    });

    /*INFO LOWONGAN*/
    Route::group(['namespace' => 'Admin\Layanan\InfoLowongan', 'prefix' => '/admin/layanan/info-lowongan'], function() {
        // show list info lowongan
        Route::get('/list', 'ShowListInfoLowonganController')->name('list-info-lowongan');
        // show form create info lowongan
        Route::get('/form-create', 'ShowFormCreateInfoLowonganController')->name('form-create-info-lowongan');
        // create new info lowongan
        Route::post('/create', 'CreateInfoLowonganController')->name('create-info-lowongan');
        // show form update info lowongan
        Route::get('/form-update/{info_lowongan}', 'ShowFormUpdateInfoLowonganController')->name('form-update-info-lowongan');
        // update info lowongan
        Route::put('/update/{info_lowongan}', 'UpdateInfoLowonganController')->name('update-info-lowongan');
        //delete info lowongan
        Route::delete('/delete/{info_lowongan}', 'DeleteInfoLowonganController')->name('delete-info-lowongan');
    });
});