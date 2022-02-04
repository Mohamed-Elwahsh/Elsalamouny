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
Route::group(['prefix' => 'admin-panel', 'middleware' => ['auth:admin']], function () {
//    Route::prefix('area')->group(function () {
//        Route::get('/', 'AreaModuleController@index');
        Route::resource('country', 'CountryController');
        Route::resource('government', 'GovernmentController');
        Route::resource('city', 'CityController');
        Route::resource('zone', 'ZoneController');
        Route::get('getGovernmentList/{country_id}', 'CityController@getGov');
        Route::get('getCityList/{gov_id}', 'ZoneController@getZone');
        Route::get('getZoneList/{city_id}', 'ZoneController@getZones');
//    });
});
