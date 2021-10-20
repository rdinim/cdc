<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/cek', 'CekController@cek')->name('cek');

/* AUTHENTICATION ROUTES */
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'ShowLoginFormController')->name('login-form');
    Route::post('/login', 'LoginController')->name('login');
    Route::post('/logout', 'LogoutController')->name('logout');
});

/* PROTECTING ROUTES WITH LOGIN */
Route::get('/dashboard', 'DashboardController')->middleware('auth')->name('dashboard');

/*----------------------------------------------------------------------------------------------------------------------------*/
/* ---ADMIN--- */

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

/*--------------MEDIA-----------------------*/
/*BERITA*/
// Route::group(['namespace' => 'Admin\Media\Berita', 'prefix' => '/admin/media/berita'], function(){
//     // show list berita
//     Route::get('/list', 'ShowListBeritaController')->name('list-berita');
//     // show form create berita
//     Route::get('/form-create', 'ShowFormCreateBeritaController')->name('form-create-berita');
//     // create new berita
//     Route::post('/create', 'CreateBeritaController')->name('create-berita');
//     // show form update berita
//     Route::get('/form-update/{berita}', 'ShowFormUpdateBeritaController')->name('form-update-berita');
//     // update berita
//     Route::put('/update/{berita}', 'UpdateBeritaController')->name('update-berita');
//     //delete berita
//     Route::delete('/delete/{berita}', 'DeleteBeritaController')->name('delete-berita');
// });

/*--------------------PTW-------------------------*/
/* PENGUMUMAN */
Route::group(['namespace' => 'Admin\PTW\Pengumuman', 'prefix' => '/admin/ptw/pengumuman'], function(){
    // show list pengumuman
    Route::get('/list', 'ShowListPengumumanController')->name('list-pengumuman');
    // show form create pengumuman
    Route::get('/form-create', 'ShowFormCreatePengumumanController')->name('form-create-pengumuman');
    // create new pengumuman
    Route::post('/create', 'CreatePengumumanController')->name('create-pengumuman');
    // show form update pengumuman
    Route::get('/form-update/{pengumuman}', 'ShowFormUpdatePengumumanController')->name('form-update-pengumuman');
    // update pengumuman
    Route::put('/update/{pengumuman}', 'UpdatePengumumanController')->name('update-pengumuman');
    //delete pengumuman
    Route::delete('/delete/{pengumuman}', 'DeletePengumumanController')->name('delete-pengumuman');
});

/*-------------------------------------------------------------------------------------------------------------------------*/
/* ALUMNI */
Route::group(['namespace' => 'Alumni', 'prefix' => '/alumni'], function() {
    // 
});


/*-------------------------------------------------------------------------------------------------------------------------*/
/* WEBSITE */
Route::group(['namespace' => 'Website'], function() {
    // show homepage
    Route::get('/', 'HomepageController')->name('homepage');
    // //show layanan bimbingan karir
    // Route::get('/layanan/bimbingan-karir', 'BimbinganKarirController')->name('bimbingan-karir');
    // //show layanan info lowongan
    // Route::get('layanan/info-lowongan', 'InfoLowonganController')->name('info-lowongan');
});