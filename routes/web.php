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


Auth::routes();

Route::group(['middleware'=>['activeUser']],function(){
    Route::resources(['/admin/posts'=>'AdminPostsController']);
    Route::resources(['/admin/categories'=>'AdminCategoriesController']);

    Route::post('/admin/posts/filter','AdminPostsController@filter');
    Route::resources(['admin/site' => 'AdminSiteController']);

});
Route::get('/admin','AdminController@index')->name('admin');

Route::group(['middleware'=>['activeUser','admin']],function(){
    Route::resources(['/admin/users'=>'AdminUsersController']);
});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'PostController@show')->name('post');
