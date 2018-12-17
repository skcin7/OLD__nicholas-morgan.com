<?php

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

// Set pattern for TLD to be:
Route::pattern('tld', '(io|development)');

// Main "App" routes:
Route::group(['domain' => 'nicholas-morgan.{tld}'], function() {
    Route::get('/', 'HomepageController@showHomepage');
//    Route::get('login', 'AuthController@showLoginPage');
//    Route::post('login', 'AuthController@login');
//    Route::get('posts', 'PostsController@showAllPosts');
//    Route::get('posts/{identifier}', 'PostsController@showPost');
//    Route::get('logout', 'AuthController@logout');
//    Route::get('contra', 'ContraController@play');
//
//    Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
//        Route::get('/', 'Admin\HomepageController@showHomepage');
//        Route::post('settings', 'Admin\HomepageController@saveGlobalSettings');
//        Route::get('posts', 'Admin\PostsController@showPosts');
//        Route::get('posts/add', 'Admin\PostsController@showPost');
//        Route::post('posts/add', 'Admin\PostsController@processPost');
//        Route::get('posts/{identifier}', 'Admin\PostsController@showPost');
//        Route::post('posts/{identifier}', 'Admin\PostsController@processPost');
//    });

});

// "Admin" routes:
Route::group(['domain' => 'admin.nicholas-morgan.{tld}', 'namespace' => 'App\Http\Controllers\Admin'], function() {
    Route::get('/', 'HomepageController@showHomepage');
});
