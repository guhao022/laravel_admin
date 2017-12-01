<?php

Route::group([
    'middleware' => 'web',
    'prefix' => 'admin',
    'namespace' => 'Modules\Admin\Controllers',
], function() {

    Route::get('/', 'HomeController@index');

    // 用户
    Route::group(['prefix' => 'user'], function (){
        Route::post('register', 'UsersController@register');
        Route::post('login', 'UsersController@login');
        Route::any('logout', 'Auth\\LoginController@logout');
        Route::get('center', 'UsersController@center');
        Route::post('avatar', 'UsersController@avatar');
        Route::post('edit', 'UsersController@edit');
    });

    // 内容
    Route::group(['prefix' => 'content'], function (){
        Route::post("create", "ContentController@create");
        Route::post("edit/{id}", "ContentController@edit");
        Route::get("info/{id}", "ContentController@info");
        Route::get("search", "ContentController@search");
        Route::get("detail/{id}", "ContentController@detail");
        Route::get("download/{id}", "ContentController@download");
        Route::get("collect/{id}", "ContentController@collect");

    });

});