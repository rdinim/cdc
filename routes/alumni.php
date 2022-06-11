<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'auth.alumni']], function () {
    Route::group(['namespace' => 'Alumni\Kuesioner', 'prefix' => '/tracerstudy'], function() {
        // show pertanyaan kuesioner
        Route::get('/', 'ShowFormKuesionerController')->name('form-kuesioner');

        // submit jawaban kuesioner
        Route::post('/', 'PostKuesionerController')->name('submit-kuesioner');
    });

});