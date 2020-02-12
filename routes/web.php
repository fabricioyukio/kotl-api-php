<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('v1')->group(function(){
    Route::get('contenders', 'ContenderController@active');
    Route::get('contender/{id}/{token}', 'ContenderController@confirm');
    Route::get('contender/{id}', 'ContenderController@get');
    Route::post('contender', 'ContenderController@create');
});
