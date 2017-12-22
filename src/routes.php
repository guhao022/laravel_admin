<?php

Route::group([
    'middleware' => ['web', 'admin'],
    'prefix' => config("admin.route.prefix"),
    'namespace' => config("admin.route.namespace"),
], function() {

    Route::get('/', 'HomeController@index')->name('admin.home');

    // 验证
    Route::group(['prefix' => 'auth'], function (){
        Route::get('login', 'AuthController@getlogin')->name('admin.login');
        Route::post('login', 'AuthController@postlogin');
        Route::post('logout', 'AuthController@postlogout')->name('admin.logout');
    });

    // 账号管理
    Route::get('profile','AdminController@profile')->name('admin.profile');
    Route::post('profile','AdminController@profileUpdate')->name('admin.profile');
    Route::resource('admin','AdminController');

    // 权限
    Route::get('permission/child/{permission}','PermissionController@childIndex')->name('permission.child');
    Route::resource('permission','PermissionController');

    // 角色
    Route::resource('role','RoleController');

    // 通知
    Route::get('notification/{notification}', 'NotificationController@show')->name('notification.show');

});