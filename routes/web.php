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
    return view('dashboard.dashboard');
});

Route::get('user', function () {
    return view('management_user.managementuser');
});

Route::get('biodata', function () {
    return view('biodata.biodata');
});

Route::get('lembur', function () {
    return view('pengajuan.lembur');
})->name('pengajuan.lembur');

Route::get('cuti', function () {
    return view('pengajuan.cuti');
})->name('pengajuan.cuti');

Route::get('ijin', function () {
    return view('pengajuan.ijin');
})->name('pengajuan.ijin');

Route::get('absensi', function () {
    return view('absensi.absensi');
});

Route::get('ijin-persetujuan', function () {
    return view('persetujuan.ijin-persetujuan');
})->name('persetujuan.ijin');

Route::get('cuti-persetujuan', function () {
    return view('persetujuan.cuti-persetujuan');
})->name('persetujuan.cuti');

Route::get('lembur-persetujuan', function () {
    return view('persetujuan.lembur-persetujuan');
})->name('persetujuan.lembur');