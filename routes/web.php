<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\Language\LanguageController;
use App\Http\Controllers\Admin\MainPage\MainPageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\FrontEnd\Blog\FBlogController;
use App\Http\Controllers\Admin\Blog\BlogCommentController;
use App\Http\Controllers\Frontend\FContactController;
use App\Http\Controllers\Admin\Contact\ContactRequestController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\SubCategorySonController;
use App\Http\Controllers\SearchProductController;
use App\Http\Controllers\Admin\Category\SeriesController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Reference\ReferenceCategoryController;
use App\Http\Controllers\Admin\Reference\ReferenceController;
use App\Http\Controllers\FReferenceController;
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
   Route::post('/form', [FContactController::class, 'store'])->name('sendForm')->middleware('throttle:1,5');
});

Route::prefix('search')->as('search.')->group(function () {
    Route::get('/{slug}', [SearchProductController::class, 'category'])->name('category');
    Route::get('/{slug}/category/{subCategory}', [SearchProductController::class, 'subCategory'])->name('subCategory');
    Route::get('/{slug}/category/{subCategory}/sub-category/{subCategorySon}', [SearchProductController::class, 'subCategorySon'])->name('subCategorySon');
    Route::get('/{slug}/category/{subCategory}/sub-category/{subCategorySon}/product/{product}', [SearchProductController::class, 'subCategoryProduct'])->name('subCategoryProduct');
});

Route::prefix('reference')->as('reference.')->group(function () {
    Route::get('/', [FReferenceController::class, 'index'])->name('index');
    Route::get('/category/{category}', [FReferenceController::class, 'category'])->name('category');
    Route::get('/category/{category}/{slug}', [FReferenceController::class, 'detail'])->name('detail');
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
    Route::resource('slider', SliderController::class); // Sliderlar
    Route::resource('language', LanguageController::class);// Diller
    Route::resource('main-page',MainPageController::class);//Anasayfa Bölümleri
    Route::resource('contact-request',ContactRequestController::class);//Anasayfa Bölümleri
    Route::resource('reference', ReferenceController::class); //referanslar

    /*------------------------------Bloglar-----------------------------------*/
    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('blog-comment', BlogCommentController::class);
    Route::resource('blog', BlogController::class);

    /*------------------------------Kategoriler-----------------------------------*/
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::resource('subCategorySon', SubCategorySonController::class);
    Route::resource('series', SeriesController::class);
    Route::resource('product', ProductController::class);
    Route::resource('reference-category', ReferenceCategoryController::class);

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
