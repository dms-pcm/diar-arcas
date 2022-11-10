<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::post('refresh', 'App\Http\Controllers\Api\AuthController@refresh');

Route::group(['middleware' => 'jwt.verify'], function () {
    Route::post('logout', 'App\Http\Controllers\Api\AuthController@logout');
    Route::post('me', 'App\Http\Controllers\Api\AuthController@me');

    Route::group(['prefix' => 'management-user'], function () {
        Route::get('/',  'App\Http\Controllers\Api\AuthController@index');
        Route::post('/tambah-user',  'App\Http\Controllers\Api\AuthController@store');
        Route::post('/update-user/{id}',  'App\Http\Controllers\Api\AuthController@update');
        Route::delete('/delete-user/{id}',  'App\Http\Controllers\Api\AuthController@destroy');
    });
});
