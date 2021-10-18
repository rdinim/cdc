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

Route::get('/', 'WelcomeController@welcome')->name('welcome');
Route::get('/cek', 'CekController@cek')->name('cek');

/* AUTHENTICATION ROUTES */
Route::group(['namespace' => 'Auth'], function () {
    Route::get('/login', 'ShowLoginFormController')->name('login-form');
    Route::post('/login', 'LoginController')->name('login');
    Route::post('/logout', 'LogoutController')->name('logout');
});

/* PROTECTING ROUTES WITH LOGIN */
Route::get('/dashboard', 'DashboardController')->middleware('auth')->name('dashboard');


/* ADMIN */

/*Layanan/Services*/
Route::group(['namespace' => 'Admin\Services', 'prefix' => '/admin/layanan'], function() {
    // show list bimbingan karir
    Route::get('/bimbingan-karir/list', 'ShowBimbinganKarirController')->name('list-bimbingan-karir');
    // show form bimbingan karir
    Route::get('/bimbingan-karir/form', 'ShowFormBimbinganKarirController')->name('form-bimbingan-karir');
    //create new bimbingan karir
    // Route::post('/bimbingan-karir/create', 'CreateBimbinganKarirController')->name('create-bimbingan-karir');
    //update bimbingan karir
});


/* ALUMNI */
Route::group(['namespace' => 'Alumni', 'prefix' => '/alumni'], function() {
    // 
});


/* WEBSITE */
Route::group(['namespace' => 'Website'], function() {
    // 
});