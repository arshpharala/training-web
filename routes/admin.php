<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CMS\CityController;
use App\Http\Controllers\Admin\CMS\NewsController;
use App\Http\Controllers\Admin\CMS\PageController;
use App\Http\Controllers\Admin\CMS\StateController;
use App\Http\Controllers\Admin\CMS\VenueController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CMS\CommonController;
use App\Http\Controllers\Admin\CMS\LocaleController;
use App\Http\Controllers\Admin\CMS\CountryController;
use App\Http\Controllers\Admin\CMS\SettingController;
use App\Http\Controllers\Admin\CMS\TinyMCEController;
use App\Http\Controllers\Admin\Catalog\BrandController;
use App\Http\Controllers\Admin\CMS\StatisticController;
use App\Http\Controllers\Admin\Catalog\CourseController;
use App\Http\Controllers\Admin\CMS\AttachmentController;
use App\Http\Controllers\Admin\Catalog\ProductController;
use App\Http\Controllers\Admin\CMS\TestimonialController;
use App\Http\Controllers\Admin\Catalog\CategoryController;
use App\Http\Controllers\Admin\Catalog\AttributeController;
use App\Http\Controllers\Admin\CMS\PartnerController;
use App\Http\Controllers\Admin\Catalog\ProductVariantController;

Route::get('dashboard',                             [DashboardController::class, 'dashboard'])->name('dashboard');

Route::group(['prefix' => '/catalog', 'as' => 'catalog.'], function () {

    Route::resource('categories',               CategoryController::class);
    Route::delete('categories/{category}/restore',  [CategoryController::class, 'restore'])->name('categories.restore');
    Route::post('categories/bulk-delete',           [CategoryController::class, 'bulkDelete'])->name('categories.bulk-delete');
    Route::post('categories/bulk-restore',          [CategoryController::class, 'bulkRestore'])->name('categories.bulk-restore');


    Route::resource('courses',                  CourseController::class);
});


Route::group(['prefix' => '/cms', 'as' => 'cms.'], function () {
    Route::resource('attachments',              AttachmentController::class);
    Route::resource('settings',                 SettingController::class);

    Route::resource('countries', CountryController::class);
    Route::resource('states', StateController::class);
    Route::resource('cities', CityController::class);

    Route::resource('venues', VenueController::class);
    Route::resource('news', NewsController::class);
    Route::resource('testimonials',                     TestimonialController::class);

    Route::post('/sort/rows',               [CommonController::class, 'sortRows'])->name('sortRows');

    Route::resource('locales',                  LocaleController::class);
    Route::delete('locales/{product}/restore',      [LocaleController::class, 'restore'])->name('locales.restore');


    Route::resource('pages',                    PageController::class);
    Route::delete('pages/{product}/restore',        [PageController::class, 'restore'])->name('pages.restore');


    Route::resource('partners',                               PartnerController::class);
    Route::delete('partners/{partner}/restore',               [PartnerController::class, 'restore'])->name('partners.restore');

    Route::resource('statistics',                       StatisticController::class);

    Route::post('upload/tinymce',                   [TinyMCEController::class, 'upload'])->name('upload.tinymce');
});
