<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\DonaturController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
/**
 * route for admin
 */

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {

        //route dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::get('/donatur', [DonaturController::class, 'index'])->name('admin.donatur.index');

        Route::post('/donatur', [DonaturController::class, 'store'])->name('admin.donatur.store');

        Route::get('/donatur/create', [DonaturController::class, 'create'])->name('admin.donatur.create');

        Route::get('/donatur/{donatur}/edit', [DonaturController::class, 'edit'])->name('admin.donatur.edit');

        Route::patch('/donatur/{donatur}', [DonaturController::class, 'update'])->name('admin.donatur.update');

        Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');

        Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');

        Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');

        Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');

        Route::patch('/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');

    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

