<?php

use App\Http\Controllers\Admin\About\AboutController;
use App\Http\Controllers\Admin\About\AboutGalleryController;
use App\Http\Controllers\Admin\About\DownloadableContentController;
use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\Blog\BlogCategoryController;
use App\Http\Controllers\Admin\Blog\BlogCommentController;
use App\Http\Controllers\Admin\Blog\BlogController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SeriesController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\SubCategorySonController;
use App\Http\Controllers\Admin\Contact\ContactRequestController;
use App\Http\Controllers\Admin\JobRequestFormController;
use App\Http\Controllers\Admin\Language\LanguageController;
use App\Http\Controllers\Admin\MainPage\MainPageController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Production\ProductionCategoryController;
use App\Http\Controllers\Admin\Production\ProductionController;
use App\Http\Controllers\Admin\Reference\ReferenceCategoryController;
use App\Http\Controllers\Admin\Reference\ReferenceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\Slider\SliderController;
use App\Http\Controllers\Admin\Team\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Video\VideoController;
use App\Http\Controllers\FAboutController;
use App\Http\Controllers\FJobRequestFormController;
use App\Http\Controllers\FProductionController;
use App\Http\Controllers\FReferenceController;
use App\Http\Controllers\Frontend\FContactController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\NewsPaperController;
use App\Http\Controllers\SearchProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::post('city', [HomeController::class, 'city'])->name('city');
Route::get('change-language/{language}', [HomeController::class, 'changeLanguage'])->name('changeLanguage');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('subscribe', [HomeController::class, 'subscribe'])->name('subscribe');//->middleware('throttle:2,5');// 5 Dakikada 1 istek

Route::prefix('blog')->as('blog.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Frontend\FBlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [\App\Http\Controllers\Frontend\FBlogController::class, 'detail'])->name('detail');
    Route::get('/category/{slug}', [\App\Http\Controllers\Frontend\FBlogController::class, 'category'])->name('category');
});
Route::prefix('subeler')->as('branche.')->group(function () {
    Route::get('/', [\App\Http\Controllers\FBrancheController::class, 'index'])->name('index');
    Route::get('/{branche}', [\App\Http\Controllers\FBrancheController::class, 'detail'])->name('detail');
});
Route::prefix('contact')->as('contact.')->group(function () {
   Route::get('/', [FContactController::class, 'index'])->name('index');
   Route::post('/form', [FContactController::class, 'store'])->name('sendForm');//->middleware('throttle:1,5');
});

Route::prefix('job-request-form')->as('jobRequest.')->group(function () {
    Route::get('/', [FJobRequestFormController::class, 'index'])->name('index');
    Route::post('/form', [FJobRequestFormController::class, 'store'])->name('sendForm')/*->middleware('throttle:1,5')*/;
});
Route::get('/about', [FAboutController::class, 'index'])->name('about.index');
Route::get('board-of-directors', [FAboutController::class, 'team'])->name('team');
Route::get('videos', [FAboutController::class, 'video'])->name('video');
Route::get('newspaper', [FAboutController::class, 'newspaper'])->name('newspaper');
Route::get('kvkk', [HomeController::class, 'kvkk'])->name('kvkk.index'); //kvkk

Route::prefix('product')->as('product.')->group(function () {
    Route::get('/', [HomeController::class, 'product'])->name('index');
    Route::get('/{slug}', [HomeController::class, 'productDetail'])->name('detail');
    Route::get('/category/{slug}', [HomeController::class, 'productCategory'])->name('category');

});

Route::prefix('reference')->as('reference.')->group(function () {
    Route::get('/', [FReferenceController::class, 'index'])->name('index');
    Route::get('/category/{category}', [FReferenceController::class, 'category'])->name('category');
    Route::get('/category/{category}/{slug}', [FReferenceController::class, 'detail'])->name('detail');
});

Route::prefix('production')->as('production.')->group(function () {
    Route::get('/', [FProductionController::class, 'index'])->name('index');
    Route::get('/category/{category}', [FProductionController::class, 'category'])->name('category');
});

Auth::routes();

Route::middleware('auth')->prefix('dashboard')->as('admin.')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::resource('user', UserController::class);
    Route::resource('slider', SliderController::class); // Sliderlar
    Route::resource('production', ProductionController::class); // Sliderlar
    Route::resource('language', LanguageController::class);// Diller
    Route::resource('main-page',MainPageController::class);//Anasayfa Bölümleri
    Route::resource('contact-request',ContactRequestController::class);//Anasayfa Bölümleri
    Route::resource('reference', ReferenceController::class); //referanslar
    Route::resource('team', TeamController::class); //yönetim kurulu
    Route::resource('video', VideoController::class); //videolar
    Route::resource('newspaper', NewsPaperController::class); //videolar
    Route::resource('jobRequestForm', JobRequestFormController::class); //iş başvuruları
    Route::get('kvkk', [\App\Http\Controllers\Admin\HomeController::class, 'kvkk'])->name('kvkk.index'); //kvkk

    /*------------------------------Bloglar-----------------------------------*/
    Route::resource('blog-category', BlogCategoryController::class);
    Route::resource('blog-comment', BlogCommentController::class);
    Route::resource('blog', BlogController::class);

    /*------------------------------Hakkımızda-----------------------------------*/
    Route::resource('about', AboutController::class);
    Route::resource('about-gallery', AboutGalleryController::class);
    Route::resource('downloadable-content', DownloadableContentController::class);
    /*------------------------------Kategoriler-----------------------------------*/
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::resource('subCategorySon', SubCategorySonController::class);
    Route::resource('series', SeriesController::class);
    Route::resource('product', ProductController::class);
    Route::resource('reference-category', ReferenceCategoryController::class);
    Route::resource('productionCategory', ProductionCategoryController::class);
    Route::resource('branche', \App\Http\Controllers\BrancheController::class);

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
