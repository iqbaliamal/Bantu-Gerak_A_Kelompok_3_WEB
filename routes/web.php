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
    return view('admin.pages.home');
});

Route::get('kegiatan', [KegiatanController::class, 'index'])->name('list.kegiatan');
Route::get('kegiatan/tambah', [KegiatanController::class, 'create'])->name('tambah.kegiatan');
Route::get('kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('edit.kegiatan');
Route::post('kegiatan/store', [KegiatanController::class, 'store'])->name('add.kegiatan');
Route::post('kegiatan/update/{id}', 'KegiatanController@update')->name('update.kegiatan');
Route::get('/kegiatan/delete/{id}', 'KegiatanController@destroy')->name('delete.kegiatan');
