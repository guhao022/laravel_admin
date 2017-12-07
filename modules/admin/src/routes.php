<?php

Route::group([
    'middleware' => ['web', 'admin'],
    'prefix' => 'admin',
    'namespace' => 'Modules\Admin\Controllers',
], function() {

    Route::get('/', 'HomeController@index');

    // 验证
    Route::group(['prefix' => 'auth'], function (){
        Route::get('login', 'AuthController@getlogin')->name('login');
        Route::post('login', 'AuthController@postlogin');
        Route::post('logout', 'AuthController@postlogout')->name('logout');
    });

    // 账号管理
    Route::group(['prefix' => 'user'], function (){
        Route::get('/setting/{uid}', 'UsersController@getsetting');
        //Route::post('setting/{uid}', 'UsersController@postsetting');
    });

});