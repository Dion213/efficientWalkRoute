<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    Route::prefix('/')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    });

    Route::prefix('shoppinglists')->group(function () {
        Route::get('/', [ShoppingListController::class, 'index'])->name('shopping-list.index');
    });

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    });

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    });

    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    });

    Route::prefix('rules')->group(function () {
        Route::get('/', [RulesController::class, 'index'])->name('rules.index');
    });
});
