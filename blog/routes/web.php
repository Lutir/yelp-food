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

Route::post('/autocomplete', 'MainController@makeRequest');
Route::post('/results', 'MainController@findBusiness');
Route::post('/sortResults', 'MainController@sortBusiness');


Route::get('/', function() {
    return view('welcome');
 });
 Route::get('/getBusiness', function() {
    return view('find');
 });

