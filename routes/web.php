<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\UserController;
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
        Route::get('/add', [OrderController::class, 'create'])->name('orders.create');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    });

    Route::prefix('shoppinglists')->group(function () {
        Route::get('/', [ShoppingListController::class, 'index'])->name('shopping-list.index');
        Route::get('/add', [ShoppingListController::class, 'create'])->name('shopping-list.create');
        Route::get('/{shoppinglist}/edit', [ShoppingListController::class, 'edit'])->name('shopping-list.edit');
    });

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/add', [ArticleController::class, 'create'])->name('articles.create');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    });

    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/add', [DepartmentController::class, 'create'])->name('departments.create');
        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    });

    Route::prefix('rules')->group(function () {
        Route::get('/', [RulesController::class, 'index'])->name('rules.index');
        Route::get('/add', [RulesController::class, 'create'])->name('rules.create');
        Route::get('/{rule}/edit', [RulesController::class, 'edit'])->name('rules.edit');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/add', [UserController::class, 'create'])->name('users.create');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    });
});
