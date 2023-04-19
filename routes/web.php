<?php

use App\Http\Controllers\Download\Back\DownloadController;
use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view('home');
});

Route::get('manager/download/file/{file}' , [DownloadController::class , 'index_320']);
