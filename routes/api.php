<?php

use App\Http\Controllers\Manager\FileController;
use App\Http\Controllers\Sanctum\SanctumController;
use App\Http\Controllers\Manager\BiographiController;
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\ChartController;
use App\Http\Controllers\Manager\MemberShipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\UserController;
use \App\Http\Controllers\Manager\Search\SearchController;
use App\Http\Controllers\Manager\DiscountController;

Route::post('login', [SanctumController::class, 'login'])->name('login');
Route::post('register', [SanctumController::class, 'register'])->name('register');
Route::post('logout', [SanctumController::class, 'logout'])->name('logout');

Route::name('Manager.')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('membership', MemberShipController::class);
    Route::get('chart_user', [ChartController::class, 'user'])->name('chart_user');
    Route::get('chart_category', [ChartController::class, 'category'])->name('chart_category');
    Route::apiResource('biographi', BiographiController::class);
    Route::get('search/category', [SearchController::class, 'category'])->name('search_category');
    Route::apiResource('discount', DiscountController::class);
    Route::apiResource('files', FileController::class);
    
});
