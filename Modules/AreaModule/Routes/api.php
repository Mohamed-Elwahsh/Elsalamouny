<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('listCity/{type}', 'Api\CityApiController@index');
Route::get('listCity', 'Api\CityApiController@getAllCity');
Route::get('listZone', 'Api\ZoneApiController@index');
Route::get('listZone/{city_id}', 'Api\ZoneApiController@findZone');
Route::get('listZone/{city_id}/{search_work}', 'Api\ZoneApiController@findZone');
