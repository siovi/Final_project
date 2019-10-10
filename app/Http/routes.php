<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::auth();

Route::get('/home', 'HomeController@index')-> name('home');

Route::get('/post', 'PostController@post');

Route::get('/profile', 'ProfileController@profile');

Route::get('/category', 'CategoryController@category');

Route::resource('/addCategory', 'CategoryController@addCategory');

Route::resource('/addProfile', 'ProfileController@addProfile');

Route::resource('/addPost', 'PostController@addPost');

Route::get('/view/{id}', 'PostController@view');

Route::get('/edit/{id}','PostController@edit');

Route::post('/editPost/{id}', 'PostController@editPost');

Route::get('/delete/{id}', 'PostController@delete');

Route::get('/category/{id}', 'PostController@category');

Route::get('/category/{id}', 'PostController@category');

Route::get('/like/{id}', 'PostController@like');

Route::get('/dislike/{id}', 'PostController@dislike');

Route::post('/comment/{id}', 'PostController@comment');

Route::post('/search', 'PostController@search');


 //ministries
    Route::group(['prefix' => 'ministries'], function () {
        Route::get('/', 'MinistryController@index');
        Route::post('/', 'MinistryController@store');
        Route::patch('/', 'MinistryController@update')->name('update-ministry');

        Route::get('/{id}/edit', 'MinistryController@edit');
    });


