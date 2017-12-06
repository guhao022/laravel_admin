<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin',
    'namespace' => 'Modules\Admin\Controllers',
], function() {

    Route::get('/', 'HomeController@index');

    // 验证
    Route::group(['prefix' => 'auth'], function (){
        Route::get('login', 'AuthController@getlogin')->name('login');
        Route::post('login', 'AuthController@postlogin');
    });

});