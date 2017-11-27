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
//login register logout routes

Auth::routes();

Route::get('/logout','Auth\LoginController@logout')->name('logout');



//post admin routes
Route::middleware(['admin'])->group(function (){

    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('/admin/posts','PostsController@showpost')->name('admin-posts');

    Route::post('/admin/new-post','PostsController@newpoststore');

    Route::get('/admin/new-post','PostsController@newpost')->name('admin-newpost');

    Route::get('/admin/posts/edit/{post}','PostsController@updatepost');

    Route::post('/admin/posts/edit/{post}','PostsController@editpost');

    Route::post('/admin/posts/delete/{post}','PostsController@deletepost');

//categoty routes

    Route::get('/admin/categories','CategoriesController@categories')->name('admin-categories');

    Route::post('/admin/categories/delete','CategoriesController@deleteCategorie');

    Route::post('/admin/categories/insert','CategoriesController@insertCategorie');


//users routes

    Route::get('/admin/users','UsersController@users')->name('admin-users');

    Route::post('/admin/users/admin/{user}','UsersController@makeadmin');

    Route::post('/admin/users/user/{user}','UsersController@makeuser');


//statistixs routes

    Route::get('/admin/statistics','StatisticsController@statistics')->name('admin-statistics');


//uploads routes

    Route::get('/admin/upload','UploadsController@upload')->name('admin-upload');

    Route::post('/admin/upload','UploadsController@uploadSubmit');

    Route::post('/admin/upload/delete','UploadsController@delete');

});


//blog routes

Route::get('/','UserpostsController@index')->name('home');

Route::get('/posts/{post}','UserpostsController@show');

//users routes

Route::get('/category/{slug}','UserpostsController@category')->name('category');

Route::get('/redirect', 'SocialAuthController@redirect');

Route::get('/callback', 'SocialAuthController@callback');
