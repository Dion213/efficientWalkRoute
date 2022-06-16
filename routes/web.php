<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalkRouteController;
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
        Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
        Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
        Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
        Route::patch('/{order}/update', [OrderController::class, 'update'])->name('orders.update');
        Route::get('/{order}/destroy', [OrderController::class, 'destroy'])->name('orders.destroy');
        //TODO: OrderManager?
        Route::get('/{order}/add_article', [OrderController::class, 'addArticleToOrder'])->name('orders.add_article_to_order');
        Route::post('/{order}/add_article', [OrderController::class, 'storeOrderrule'])->name('orders.store_article_in_order');
        Route::get('/{orderrule}/remove_article', [OrderController::class, 'removeArticleFromOrder'])->name('orders.remove_article_to_order');
    });

    //TODO: Create delete
    Route::prefix('shoppinglists')->group(function () {
        Route::get('/', [ShoppingListController::class, 'index'])->name('shopping-list.index');
        Route::get('/add', [ShoppingListController::class, 'create'])->name('shopping-list.create');
        Route::get('/{shopping_list}/edit', [ShoppingListController::class, 'edit'])->name('shopping-list.edit');
        Route::get('/{shopping_list}/destroy', [ShoppingListController::class, 'destroy'])->name('shopping-list.destroy');

        //Walkroute
        Route::get('/{shopping_list}/walkroute/show', [WalkRouteController::class, 'show'])->name('walkroute.show');
        Route::get('/{shopping_list}/walkroute/create', [WalkRouteController::class, 'create'])->name('walkroute.create');
    });

    Route::prefix('articles')->group(function () {
        Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
        Route::patch('/{article}/update', [ArticleController::class, 'update'])->name('articles.update');
        Route::get('/{article}/destroy', [ArticleController::class, 'destroy'])->name('articles.destroy');
    });

    Route::prefix('departments')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/create', [DepartmentController::class, 'create'])->name('departments.create');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::patch('/{department}/update', [DepartmentController::class, 'update'])->name('departments.update');
        Route::get('/{department}/destroy', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });

    //TODO: Create delete
    Route::prefix('rules')->group(function () {
        Route::get('/', [RulesController::class, 'index'])->name('rules.index');
        Route::get('/create', [RulesController::class, 'create'])->name('rules.create');
        Route::post('/store', [RulesController::class, 'store'])->name('rules.store');
        Route::get('/{rule}/edit', [RulesController::class, 'edit'])->name('rules.edit');
    });

    //TODO: Create delete
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    });
});
