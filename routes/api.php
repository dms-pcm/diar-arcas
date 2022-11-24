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
    Route::post('change-password',  'App\Http\Controllers\Api\AuthController@changePassword');

    Route::group(['prefix' => 'management-user'], function () {
        Route::get('/',  'App\Http\Controllers\Api\AuthController@index');
        Route::post('/tambah-user',  'App\Http\Controllers\Api\AuthController@store');
        Route::post('/update-user/{id}',  'App\Http\Controllers\Api\AuthController@update');
        Route::delete('/delete-user/{id}',  'App\Http\Controllers\Api\AuthController@destroy');
    });

    Route::group(['prefix' => 'presensi'], function () {
        Route::get('/',  'App\Http\Controllers\Api\AbsensiController@index');
        Route::post('/tambah-absen',  'App\Http\Controllers\Api\AbsensiController@store');
        Route::get('/show-perId',  'App\Http\Controllers\Api\AbsensiController@showPerId');
        Route::get('/show-all',  'App\Http\Controllers\Api\AbsensiController@showAll');
        // Route::post('/update-user/{id}',  'App\Http\Controllers\Api\AbsensiController@update');
        // Route::delete('/delete-user/{id}',  'App\Http\Controllers\Api\AbsensiController@destroy');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/',  'App\Http\Controllers\Api\ProfileController@index');
        Route::get('/nama',  'App\Http\Controllers\Api\ProfileController@showNama');
        Route::post('/tambah-data',  'App\Http\Controllers\Api\ProfileController@store');
        // Route::get('/show-perId',  'App\Http\Controllers\Api\ProfileController@showPerId');
        // Route::post('/update-user/{id}',  'App\Http\Controllers\Api\ProfileController@update');
        // Route::delete('/delete-user/{id}',  'App\Http\Controllers\Api\ProfileController@destroy');
    });

    Route::group(['prefix' => 'pengajuan'], function () {
        Route::get('/',  'App\Http\Controllers\Api\PengajuanController@index');
        Route::post('/tambah-izin',  'App\Http\Controllers\Api\PengajuanController@storeIzin');
        Route::post('/edit-izin/{id}',  'App\Http\Controllers\Api\PengajuanController@edit');
        Route::get('/show-cuti',  'App\Http\Controllers\Api\PengajuanController@indexCuti');
        Route::post('/tambah-cuti',  'App\Http\Controllers\Api\PengajuanController@storeCuti');
        Route::get('/show-lembur',  'App\Http\Controllers\Api\PengajuanController@indexLembur');
        Route::get('/show-lembur-admin',  'App\Http\Controllers\Api\PengajuanController@indexLemburAdmin');
        Route::post('/tambah-lembur',  'App\Http\Controllers\Api\PengajuanController@storeLembur');
        // Route::get('/show-perId',  'App\Http\Controllers\Api\PengajuanController@showPerId');
        // Route::post('/update-user/{id}',  'App\Http\Controllers\Api\PengajuanController@update');
        // Route::delete('/delete-user/{id}',  'App\Http\Controllers\Api\PengajuanController@destroy');
    });

    Route::group(['prefix' => 'persetujuan'], function () {
        Route::get('/',  'App\Http\Controllers\Api\PersetujuanController@index');
        Route::post('/accept/{id}',  'App\Http\Controllers\Api\PersetujuanController@setuju');
        Route::post('/direct/{id}',  'App\Http\Controllers\Api\PersetujuanController@direct');
        Route::get('/show-cuti',  'App\Http\Controllers\Api\PersetujuanController@indexCuti');
        Route::get('/show-lembur',  'App\Http\Controllers\Api\PersetujuanController@indexLembur');
        // Route::post('/edit-izin/{id}',  'App\Http\Controllers\Api\PersetujuanController@edit');
        // Route::get('/show-perId',  'App\Http\Controllers\Api\PersetujuanController@showPerId');
        // Route::post('/update-user/{id}',  'App\Http\Controllers\Api\PersetujuanController@update');
        // Route::delete('/delete-user/{id}',  'App\Http\Controllers\Api\PersetujuanController@destroy');
    });
});
