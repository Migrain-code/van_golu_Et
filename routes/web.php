<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\Language\LanguageController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\MainPage\MainPageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubCategoryProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\FrontEnd\Blog\FBlogController;
use App\Http\Controllers\Admin\Blog\BlogCommentController;
use App\Http\Controllers\Frontend\FContactController;
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
Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('changeLanguage');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('blog')->as('blog.')->group(function () {
    Route::get('/', [FBlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [FBlogController::class, 'detail'])->name('detail');
    Route::get('/category/{slug}', [FBlogController::class, 'category'])->name('category');
});

Route::prefix('contact')->as('contact.')->group(function () {
   Route::get('/', [FContactController::class, 'index'])->name('index');
});

Auth::routes();

Route::middleware('auth')->prefix('dashboard')->as('admin.')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    /*------------------------------Customer Routes-----------------------------------*/
    Route::resource('customer', CustomerController::class);
    Route::controller(CustomerController::class)->prefix('customer')->as('customer.')->group(function (){
        Route::post('update/phone', 'updatePhone')->name('updatePhone');
        Route::post('update/phone/verify', 'verifyPhone')->name('verifyPhone');
        Route::post('update/password', 'updatePassword')->name('updatePassword');
    });
    Route::resource('product', ProductController::class); // Ürünler
    Route::resource('slider', SliderController::class); // Sliderlar
    Route::resource('language', LanguageController::class);// Diller
    Route::resource('main-page',MainPageController::class);//Anasayfa Bölümleri

    /*------------------------------Bloglar-----------------------------------*/
    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('blog-comment', BlogCommentController::class);
    Route::resource('blog', BlogController::class);


    Route::resource('mainCategory', MainCategoryController::class);
    Route::resource('subCategory', SubCategoryController::class);
    Route::resource('subCategoryProduct', SubCategoryProductController::class);

    /*------------------------------Ajax Commands-----------------------------------*/
    Route::controller(AjaxController::class)->as('ajax.')->prefix('ajax')->group(function () {
        Route::post('/update-featured', 'updateFeatured')->name('updateFeatured');
        Route::post('/delete/object', 'deleteFeatured')->name('deleteFeatured');
        Route::post('/delete/all/object', 'deleteAllFeatured')->name('deleteAllFeatured');
        Route::post('/get/district', 'getDistrict')->name('getDistrictUrl');
        Route::post('/variant/option', 'getVariantOption')->name('getVariantOption');
    });
    /*------------------------------Ayarlar-----------------------------------*/
    Route::controller(SettingController::class)->prefix('settings')->as('settings.')->group(function (){
        Route::get('/customer', [SettingController::class, 'customer'])->name('customer');
        Route::post('update/main', [SettingController::class, 'updateMain'])->name('updateMain');
        Route::post('/', [SettingController::class, 'update'])->name('update');
    });
});
