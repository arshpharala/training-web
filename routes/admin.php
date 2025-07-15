<?php

use App\Http\Controllers\Admin\CMS\AttachmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CMS\SettingController;
use App\Http\Controllers\Admin\Catalog\ProductController;
use App\Http\Controllers\Admin\Catalog\CategoryController;
use App\Http\Controllers\Admin\Catalog\AttributeController;
use App\Http\Controllers\Admin\Catalog\BrandController;
use App\Http\Controllers\Admin\Catalog\ProductVariantController;
use App\Http\Controllers\Admin\CMS\LocaleController;
use App\Http\Controllers\Admin\CMS\PageController;
use App\Http\Controllers\Admin\CMS\TinyMCEController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => '/catalog', 'as' => 'catalog.'], function () {

    Route::resource('categories', CategoryController::class);
    Route::delete('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::post('categories/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('categories.bulk-delete');
    Route::post('categories/bulk-restore', [CategoryController::class, 'bulkRestore'])->name('categories.bulk-restore');


    

});


Route::group(['prefix' => '/cms', 'as' => 'cms.'], function () {
    Route::resource('attachments', AttachmentController::class);
    Route::resource('settings', SettingController::class);

    Route::resource('locales', LocaleController::class);
    Route::delete('locales/{product}/restore', [LocaleController::class, 'restore'])->name('locales.restore');


    Route::resource('pages', PageController::class);
    Route::delete('pages/{product}/restore', [PageController::class, 'restore'])->name('pages.restore');

    Route::post('upload/tinymce', [TinyMCEController::class, 'upload'])->name('upload.tinymce');

});



