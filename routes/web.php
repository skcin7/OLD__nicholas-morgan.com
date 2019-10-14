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

Route::get('/', 'WelcomeController@showWelcome');
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@login');
Route::get('posts', 'PostsController@showPosts');
Route::get('posts/{postID}', 'PostsController@showPost');
Route::get('logout', 'AuthController@logout');
Route::get('contra', 'ContraController@play');
Route::get('skills', 'SkillsController@showSkills');
Route::get('projects', 'ProjectsController@showProjects');


Route::get('home', 'HomeController@showHomePage');


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('/', 'Admin\AdminController@showAdminHome');
    Route::post('settings', 'Admin\SettingsController@saveSettings');

    Route::group(['prefix' => 'misc'], function() {
        Route::get('/', 'Admin\AdminController@showMisc');
        Route::post('/', 'Admin\AdminController@saveMisc');
    });

    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', 'Admin\PostsController@showPosts');
        Route::get('add', 'Admin\PostsController@showPost');
        Route::post('add', 'Admin\PostsController@processPost');
        Route::get('{identifier}', 'Admin\PostsController@showPost');
        Route::post('{identifier}', 'Admin\PostsController@processPost');
    });

    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'Admin\ProjectsController@index');
//        Route::get('create', 'Admin\ProjectsController@create');
        Route::get('{projectID?}', 'Admin\ProjectsController@show');
        Route::post('{projectID?}', 'Admin\ProjectsController@save');


//        Route::get('add', 'Admin\ProjectsController@showPost');
//        Route::post('add', 'Admin\ProjectsController@processPost');
//        Route::get('{identifier}', 'Admin\ProjectsController@showPost');
//        Route::post('{identifier}', 'Admin\ProjectsController@processPost');
    });


});

Route::get('test', function() { dd(\Config::all()); });
