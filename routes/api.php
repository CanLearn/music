<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\ChartController;
use App\Http\Controllers\Manager\MemberShipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::prefix('auth')->group(function () {
//    Route::post('login' , [LoginController::class , 'login'])->name('login');
//    Route::post('register' , [RegisterController::class , 'register'])->name('register');
//});
Route::name('Manager.')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('category', CategoryController::class);
    Route::apiResource('membership', MemberShipController::class);
    Route::get('chart_user', [ChartController::class , 'user'])->name('chart_user');
    Route::get('chart_category', [ChartController::class , 'category'])->name('chart_category');
});
