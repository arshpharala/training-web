<?php

use App\Http\Controllers\Web\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\TestController;


Route::get('/', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get("/test", [TestController::class, 'index']);

Route::get('about-us',      [PageController::class, 'about'])->name('about');
Route::get('contact',       [PageController::class, 'contact'])->name('contact');

Route::get('courses', [CategoryController::class, 'index'])->name('categories.index');
Route::get('courses/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('courses/{category}/{course}', [CategoryController::class, 'show'])->name('courses.show');

Route::get('blog/{blog}', [HomeController::class, 'newsCetail'])->name('blog.show');

Route::post('enquiry', [PageController::class, 'enquiry'])->name('enquiry');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
