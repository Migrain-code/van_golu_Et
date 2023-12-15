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
use App\Http\Controllers\ActivityPersonalController;
use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\CustomerFaqController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\BusinessFaqController;
use App\Http\Controllers\BusinessFaqCategoryController;
use App\Http\Controllers\BusinessBlogController;
use App\Http\Controllers\ProductAdsController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SupportRequestController;
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

    Route::resource('business', BusinessController::class);
    Route::controller(BusinessController::class)->prefix('business')->as('business.')->group(function (){

    });

    Route::resource('businessComment', BusinessCommentController::class);
    Route::resource('customerNotification', CustomerNotificationMobileController::class);
    Route::resource('advert', AdsController::class);
    Route::resource('productAdvert', ProductAdsController::class);

    Route::resource('mainPage', MainPageController::class);
    Route::resource('customerBlog', CustomerBlogController::class);
    Route::resource('businessBlog', BusinessBlogController::class);

    Route::resource('activity', ActivityController::class);
    Route::resource('activitySponsor', ActivitySponsorController::class);
    Route::resource('activityPersonal', ActivityPersonalController::class);

    Route::resource('supportRequest', SupportRequestController::class);
    /*------------------------------Kategoriler Menüsü Start---------------------------------- */
    Route::resource('businessCategory', BusinessCategoryController::class);
    Route::resource('serviceCategory', ServiceCategoryController::class);
    Route::resource('customerFaqCategory', CustomerFaqController::class);
    Route::resource('customerFaq', FaqController::class);
    Route::resource('businessFaqCategory', BusinessFaqCategoryController::class);
    Route::resource('businessFaq', BusinessFaqController::class);
    /*------------------------------Kategoriler Menüsü End---------------------------------- */

    Route::resource('productCategory', ProductCategoryController::class);

    Route::controller(AjaxController::class)->as('ajax.')->prefix('ajax')->group(function () {
        Route::post('/update-featured', 'updateFeatured')->name('updateFeatured');
        Route::post('/delete/object', 'deleteFeatured')->name('deleteFeatured');
        Route::post('/delete/all/object', 'deleteAllFeatured')->name('deleteAllFeatured');
        Route::post('/get/district', 'getDistrict')->name('getDistrictUrl');
        Route::post('/update-service-category-order', 'updateServiceCategoryOrder')->name('updateServiceCategoryOrder');
        Route::post('/update-customer-sss-category-order', 'updateCustomerFaqCategoryOrder')->name('updateCustomerFaqCategoryOrder');
        Route::post('/update-business-sss-category-order', 'updateBusinessFaqCategoryOrder')->name('updateBusinessFaqCategoryOrder');

    });

    Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function (){
        Route::get('/customer', [SettingController::class, 'customer'])->name('customer');
        Route::get('/business', [SettingController::class, 'business'])->name('business');
        Route::post('update/main', [SettingController::class, 'updateMain'])->name('updateMain');
        Route::post('/', [SettingController::class, 'update'])->name('update');
    });
});
