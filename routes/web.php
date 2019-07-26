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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('calculate')->group(function () {
    Route::post('addition', 'CalculatorController@addition');
    Route::post('subtraction', 'CalculatorController@subtraction');
    Route::post('multiplication', 'CalculatorController@multiplication');
    Route::post('division', 'CalculatorController@division');
    Route::post('{unknownPage}', 'CalculatorController@unknownPage');
});
