<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\DonasiUserController;
use App\Http\Controllers\User\LandingpageControler;
use App\Models\Publication;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/', [LandingpageControler::class, 'index'])->name('user.landingpage.index');

Route::get('/list-campaign', [App\Http\Controllers\User\CampaignUserController::class, 'index'])->name('user.campaign.index');
Route::get('/list-campaign/{slug}', [LandingpageControler::class, 'getCampaign'])->name('detailCampaign');

Route::get('/blog', [BlogController::class, 'index'])->name('user.blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'getBlog'])->name('detailBlog');

// Route::resource('/donasi', DonasiUserController::class, ['as' => 'user']);
Route::get('/donation', [DonasiUserController::class, 'index'])->name('user.donasi.index');
Route::post('/donation', [DonasiUserController::class, 'store'])->name('user.donasi.store');
Route::post('/donasi/notification', [DonasiUserController::class, 'notificationHandler'])->name('user.donasi.handler');

Route::group(['middleware' => 'user'], function () {
});

Auth::routes();
Route::get('logout', [LoginController::class, 'logout'])->name('user.logout');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('show.login');
Route::post('login', [LoginController::class, 'login'])->name('login');
// Route::get('login', [LoginController::class, 'login'])->name('login');

//group route with prefix "admin"
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    //group route with middleware "admin"
    Route::group(['middleware' => 'admin'], function () {

        //route dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');

        Route::resource('/category', CategoryController::class, ['as' => 'admin']);
        Route::resource('/campaign', CampaignController::class, ['as' => 'admin']);
        Route::get('/donatur', [DonaturController::class, 'index'])->name('admin.donatur.index');
        Route::get('/donation', [DonationController::class, 'index'])->name('admin.donation.index');
        Route::get('/donation/filter', [DonationController::class, 'filter'])->name('admin.donation.filter');
        Route::resource('/program', ProgramController::class, ['as' => 'admin']);
        Route::resource('/publication', PublicationController::class, ['as' => 'admin']);
        Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::resource('/faq', FaqController::class, ['as' => 'admin']);
    });
});

//404
Route::fallback(function () {
    return view('error-404');
});

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    // $exitCode = Artisan::call('storage:link', ['--force' => true]);
    // $exitCode = "Artisan::call('storage:link', ['--force' => true])asdasd";
    // echo $exitCode;
});
