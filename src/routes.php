<?php

Route::group([
    'middleware' => ['web', 'admin'],
    'prefix' => config("admin.route.prefix"),
    'namespace' => config("admin.route.namespace"),
], function() {

    Route::get('/', 'HomeController@index')->name('admin.home');

    // 验证
    Route::group(['prefix' => 'auth'], function (){
        Route::get('login', 'Admin\\AuthController@getlogin')->name('admin.login');
        Route::post('login', 'Admin\\AuthController@postlogin');
        Route::post('logout', 'Admin\\AuthController@postlogout')->name('admin.logout');
    });

    // 账号管理
    Route::get('profile','Admin\\AdminController@profile')->name('my.profile');
    Route::post('profile','Admin\\AdminController@profileUpdate')->name('my.profile');
    Route::resource('admin','Admin\\AdminController');

    // 权限
    Route::get('permission/child/{permission}','Admin\\PermissionController@childIndex')->name('permission.child');
    Route::resource('permission','Admin\\PermissionController');

    // 角色
    Route::resource('role','Admin\\RoleController');

    // 通知
    Route::get('notification/{notification}', 'Admin\\NotificationController@show')->name('notification.show');
});