<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('json.response')->group(function(){
    Route::post('contender', 'ContenderController@create');
    Route::get('contender/activate/{uuid}', 'ContenderController@activate');
    Route::get('contender/{id}', 'ContenderController@get');
    Route::get('contender/with/email/{email}', 'ContenderController@get_by_email');
    Route::get('contender/activate/{id}/with/{token}', 'ContenderController@confirm');
    Route::get('contenders', 'ContenderController@get_active');
    Route::get('noncontenders', 'ContenderController@get_inactive');

    Route::post('vote', 'VoteController@register');
});
