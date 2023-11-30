<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\CustomerController;
use \App\Http\Controllers\BusinessCommentController;
use App\Http\Controllers\CustomerNotificationMobileController;
use App\Http\Controllers\SettingController;
use \App\Http\Controllers\AdsController;
use \App\Http\Controllers\MainPageController;
use App\Http\Controllers\CustomerBlogController;
use \App\Http\Controllers\AjaxController;
use \App\Http\Controllers\ActivityController;
use \App\Http\Controllers\ActivitySponsorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware('auth')->prefix('dashboard')->as('admin.')->group(function (){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /*------------------------------Customer Routes-----------------------------------*/
    Route::resource('customer', CustomerController::class);
    Route::controller(CustomerController::class)->prefix('customer')->as('customer.')->group(function (){
        Route::post('update/phone', 'updatePhone')->name('updatePhone');
        Route::post('update/phone/verify', 'verifyPhone')->name('verifyPhone');
        Route::post('update/password', 'updatePassword')->name('updatePassword');
    });

    Route::resource('businessComment', BusinessCommentController::class);
    Route::resource('customerNotification', CustomerNotificationMobileController::class);
    Route::resource('advert', AdsController::class);
    Route::resource('mainPage', MainPageController::class);
    Route::resource('customerBlog', CustomerBlogController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('activitySponsor', ActivitySponsorController::class);

    Route::controller(AjaxController::class)->as('ajax.')->prefix('ajax')->group(function () {
        Route::post('/update-featured', 'updateFeatured')->name('updateFeatured');
        Route::post('/delete/object', 'deleteFeatured')->name('deleteFeatured');
        Route::post('/delete/all/object', 'deleteAllFeatured')->name('deleteAllFeatured');
        Route::post('/get/district', 'getDistrict')->name('getDistrictUrl');

    });
    Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function (){
        Route::get('/customer', [SettingController::class, 'customer'])->name('customer');
        Route::get('/business', [SettingController::class, 'business'])->name('business');
        Route::post('update/main', [SettingController::class, 'updateMain'])->name('updateMain');
        Route::post('/', [SettingController::class, 'update'])->name('update');
    });
});
