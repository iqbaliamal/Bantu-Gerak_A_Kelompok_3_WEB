<?php

use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/donation/notification', [DonationController::class, 'notificationHandler']);


// /**
//  * Api Register
//  */
Route::post('/register', [RegisterController::class, 'register']);

// /**
//  * Api Login
//  */
Route::post('/login', [LoginController::class, 'login']);

/**
 * Api Campaign
 */
Route::get('/campaign', [CampaignController::class, 'index']);
Route::get('/campaign/{slug}', [CampaignController::class, 'show']);

/**
 * Api Donation
 */
Route::get('/donation', [DonationController::class, 'index']);
Route::post('/donation', [DonationController::class, 'store']);
Route::post('/donation/notification', [DonationController::class, 'notificationHandler']);
