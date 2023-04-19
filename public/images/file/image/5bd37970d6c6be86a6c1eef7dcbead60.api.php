<?php

Route::get('/me', function (\Illuminate\Http\Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/register', 'RegisterController@register');
});

Route::group([
    'middleware' => ['auth:api', 'admin'],
    'prefix' => 'admin',
    'namespace' => 'Admin'],
    function () {
        Route::apiResource('users', 'UserController');
        Route::apiResource('categories', 'CategoryController');
        Route::apiResource('membership', 'MembershipController');
        Route::apiResource('file', 'FileController');

        Route::get('membership-search', 'Search\MembershipController@index');
        Route::get('category-search', 'Search\CategoryController@index');
    });

