<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix' => 'v1'), function() {
    Route::resource('webhook', 'WebhookController', ['only' => ['index', 'store']]);
});

Route::group(array('prefix' => 'panel'), function() {
    Route::resource('sync', 'ApiaiEntityController', ['only' => ['store']]);
});
