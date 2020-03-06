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


Route::get('/', [\App\Http\Controllers\GroupingByLocationController::class, 'groipingByController']);

Route::get('grouping-by-city-location/{countryId}', [\App\Http\Controllers\GroupingByLocationController::class, 'groupingByCityLocation'])->name('grouping-by-city-location');
Route::get('grouping-by-district-location/{cityId}', [\App\Http\Controllers\GroupingByLocationController::class, 'groupingByDistrictLocation'])->name('grouping-by-district-location');
