<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\DonaturController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\KategoriController;
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

// Route::get('/', function () {
//     return view('admin.pages.home');
// });

Auth::routes();
/**
 * route for admin
 */

//group route with prefix "admin"
Route::prefix('admin')->group(function () {

    //group route with middleware "auth"
    Route::group(['middleware' => 'auth'], function () {

        //route dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        // Kategori
        Route::get('kategori', [KategoriController::class, 'index'])->name('list.kategori');
        Route::post('kategori/store', [KategoriController::class, 'store'])->name('add.kategori');
        Route::post('kategori/update/{id}', [KategoriController::class, 'update'])->name('update.kategori');
        Route::get('kategori/delete/{id}', [KategoriController::class, 'destroy'])->name('delete.kategori');

        // Kategori
        Route::get('campaign', [CampaignController::class, 'index'])->name('list.campaign');
        Route::get('campaign/create', [CampaignController::class, 'create'])->name('create.campaign');
        Route::post('campaign/store', [CampaignController::class, 'store'])->name('add.campaign');
        Route::post('campaign/edit/{id}', [CampaignController::class, 'edit'])->name('edit.campaign');
        Route::post('campaign/update/{id}', [CampaignController::class, 'update'])->name('update.campaign');
        Route::get('campaign/delete/{id}', [CampaignController::class, 'destroy'])->name('delete.campaign');

        // Donatur
        Route::get('donatur', [DonaturController::class, 'index'])->name('list.donatur');
        Route::post('donatur/store', [DonaturController::class, 'store'])->name('add.donatur');
        Route::get('donatur/create', [DonaturController::class, 'create'])->name('create.donatur');
        Route::get('donatur/edit/{id}', [DonaturController::class, 'edit'])->name('edit.donatur');
        Route::post('donatur/update/{id}', [DonaturController::class, 'update'])->name('update.donatur');
        Route::get('donatur/detele', [DonaturController::class, 'destroy'])->name('delete.donatur');

        // Donation
        Route::get('donation', [DonationController::class, 'index'])->name('list.donation');
        Route::get('donation/create', [DonationController::class, 'create'])->name('create.donation');
        Route::post('donation/store', [DonationController::class, 'store'])->name('add.donation');
        Route::get('donation/edit/{id}', [DonationController::class, 'edit'])->name('edit.donation');
        Route::post('donation/update/{id}', [DonationController::class, 'update'])->name('update.donation');
        Route::get('donation/detele', [DonationController::class, 'destroy'])->name('delete.donation');

        Route::post('user/edit-profile/{id}', [AdminController::class, 'editProfile'])->name('editProfile.user');
        Route::post('user/update-profile/{id}', [AdminController::class, 'updateProfile'])->name('updateProfile.user');
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
