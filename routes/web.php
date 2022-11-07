<?php

use Illuminate\Support\Facades\Route;

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
    return view('login');
});
Route::get('dashboard', function () {
    return view('dashboard');
});
Route::get('user', function () {
    return view('managementuser');
});
Route::get('lembur', function () {
    return view('lemburadmin');
});
Route::get('cuti', function () {
    return view('lemburadmin');
});
