<?php

Route::group(['namespace' => 'Puresolcom\Etherbase\Http\Controllers'], function() {
    Route::group(['prefix' => 'backend'], function() {
        Route::get('home', 'Backend\HomeController@index');
    });
});
