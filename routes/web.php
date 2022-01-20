<?php

use Illuminate\Support\Facades\Route;

Route::resource('/ciudades', \App\Http\Controllers\CityController::class);

Route::resource('/provincias', \App\Http\Controllers\ProvinceController::class);
Route::get('/provincias/success/{id}', [\App\Http\Controllers\ProvinceController::class, 'success']);

Route::post('/get-options-select', [\App\Http\Controllers\Utils\SearchModelController::class, 'getOptions']);
