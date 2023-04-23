<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminAuthorController;
use App\Http\Controllers\Admin\AdminBookController;
use App\Http\Controllers\Admin\AdminEmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/** Admin routes */
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
	Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.index');
	Route::resource('/categories', AdminCategoryController::class)->except(['show']);
	Route::resource('/authors', AdminAuthorController::class)->except(['show']);
	Route::resource('/books', AdminBookController::class)->except(['show']);
	Route::resource('/employees', AdminEmployeeController::class)->except(['show']);
});
/** Auth routes */
Route::middleware(['guest'])->group(function () {
	Route::get('/auth/login', [LoginController::class, 'showLoginForm'])->name('login.form');
	Route::post('/login', [LoginController::class, 'login'])->name('login.handler');
});
/** Logout routes */
Route::post('/logout', [LogoutController::class, 'logout'])->name('site.logout');
/** Site routes */
Route::get('/categories/book/{slug}', [CategoryController::class, 'single'])->name('categories.single');
Route::get('/categories/author/{authorId}', [CategoryController::class, 'author'])->name('categories.author');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/', [SiteController::class, 'index'])->name('site.index');
