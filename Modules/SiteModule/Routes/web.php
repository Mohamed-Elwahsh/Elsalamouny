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

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function() {
    Route::get('/', 'SiteModuleController@index')->name('siteIndex');
    Route::get('/category', 'SiteModuleController@category')->name('siteCategory');
    Route::get('/Showcategory/{id}', 'SiteModuleController@showCat')->name('siteShowCategory');
    Route::get('/detail/{id}', 'SiteModuleController@detail')->name('siteDetail');
    Route::POST('contact-us', 'SiteModuleController@contactUs' )->name('siteContact');
     ############# News routes #################
     Route::get('/category/categoryNews/{category_id}', 'SiteNewsController@show');
     Route::get('/category/news/{news_id}', 'SiteNewsController@showNews');
     Route::get('/all-news', 'SiteNewsController@allNews')->name('allNews');

    Route::get('add-blog', 'SiteModuleController@addBlog' )->name('addBlog');
    Route::post('addNewblog', 'SiteModuleController@addNewblog' )->name('addNewblog');
});
