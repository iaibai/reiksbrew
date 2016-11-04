<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/teams', 'TeamsController');

Route::get('/api/races', function() {
    return \App\Race::all();
});

Route::get('/api/races/{raceId}/positions', function($raceId) {
    $positions = \App\Position::getByRaceId($raceId);
    return $positions;
});