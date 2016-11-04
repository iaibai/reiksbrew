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
use App\Team;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/teams', 'TeamsController');

Route::get('/api/races/{raceId}', function($raceId) {
    $race = \App\Race::findOrFail($raceId);
    return json_encode($race);
});

Route::post('/api/teams', function(Request $request) {
    $team = new Team;
    $team->name = $request->input('name');
    $team->race_id = $request->input('raceId');
    $team->coach_id = Auth::user()->id;

    $team->save();

    return 1;
});