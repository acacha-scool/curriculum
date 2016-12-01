<?php

Route::group([
    'middleware' => 'web'], function() {
        Route::group(['middleware' => 'auth'], function () {
            Route::resource('studies', 'StudiesController');
        });
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'api',
], function() {
    //Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::resource('studies', 'StudiesController');
    });
});
