<?php

Route::group([
    'middleware' => 'web'], function() {
        Route::group(['middleware' => 'auth'], function () {
            require __DIR__.'/common_routes.php';
        });
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'api',
], function() {
    //Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require __DIR__.'/common_routes.php';
    });
});
