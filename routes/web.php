<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('home');
});
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


