<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VisitorAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReporterProfileController;
use App\Http\Controllers\ReporterPostController;

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


Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/news-category/{id}', [WebsiteController::class, 'category'])->name('news-category');
Route::get('/news-detail/{id}', [WebsiteController::class, 'detail'])->name('news-detail');

Route::get('/user-login',[VisitorAuthController::class, 'index'])->name('user-login');
Route::post('/user-login',[VisitorAuthController::class, 'login'])->name('user-login');
Route::get('/user-register',[VisitorAuthController::class, 'reg'])->name('user-register');
Route::post('/user-register',[VisitorAuthController::class, 'register'])->name('user-register');

Route::get('/user-logout',[VisitorAuthController::class, 'logout'])->name('user-logout');

Route::middleware(['visitor'])->group(function () {
    Route::get('/my-dashboard', [VisitorAuthController::class, 'dashboard'])->name('my-dashboard');
});

Route::middleware(['reporter'])->group(function () {
    Route::get('/reporter-dashboard', [ReporterProfileController::class, 'dashboard'])->name('reporter-dashboard');
    Route::get('/reporterPost/edit/{id}', [ReporterProfileController::class, 'edit'])->name('reporterPost.edit');
    Route::post('/reporterPost/update/{id}', [ReporterProfileController::class, 'update'])->name('reporterPost.update');
    Route::get('/reporterPost/delete/{id}', [ReporterProfileController::class, 'destroy'])->name('reporterPost.delete');
    Route::resource('reporter-post', ReporterPostController::class);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('reporter', ReporterController::class);
    Route::resource('post', PostController::class);
});
