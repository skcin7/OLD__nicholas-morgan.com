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

Route::get('/', 'HomepageController@showWelcomePage');
Route::get('login', 'AuthController@showLoginPage');
Route::post('login', 'AuthController@login');
Route::get('posts', 'PostsController@showAllPosts');
Route::get('posts/{identifier}', 'PostsController@showPost');
Route::get('logout', 'AuthController@logout');
Route::get('contra', 'ContraController@play');
Route::get('skills', 'AppController@showSkillsPage');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('/', 'Admin\HomepageController@showHomepage');
    Route::post('settings', 'Admin\HomepageController@saveGlobalSettings');
    Route::get('posts', 'Admin\PostsController@showPosts');
    Route::get('posts/add', 'Admin\PostsController@showPost');
    Route::post('posts/add', 'Admin\PostsController@processPost');
    Route::get('posts/{identifier}', 'Admin\PostsController@showPost');
    Route::post('posts/{identifier}', 'Admin\PostsController@processPost');
});

Route::get('test', function() { dd(\Config::all()); });