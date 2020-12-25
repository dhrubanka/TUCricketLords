<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('can:isAdmin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    
//auth
    Route::get('/admin/home', 'AdminController@index')->name('admin-home');
    Route::get('/admin/logout', 'AdminController@logout')->name('admin-logout');
//team
    Route::get('/admin/team', 'TeamController@index')->name('admin-team');
    Route::get('/admin/team/create', 'TeamController@create')->name('team-create');
    Route::post('/admin/team/store', 'TeamController@store')->name('team-store');
    Route::get('/admin/team/{team}', 'TeamController@show')->name('team-show');
    Route::get('/admin/team/{team}/edit', 'TeamController@edit')->name('team-edit');
    Route::put('/admin/team/{team}/update', 'TeamController@update')->name('team-update');
    Route::get('/admin/team/{team}/delete', 'TeamController@destroy')->name('team-delete');
//player
    Route::get('/admin/players', 'PlayerController@index')->name('admin-players');
    Route::get('/admin/players/{team}', 'PlayerController@indexTeamId')->name('admin-team-players');
    Route::get('/admin/player/{player}', 'PlayerController@show')->name('admin-player');
    Route::get('/admin/player/create/direct', 'PlayerController@createDirect')->name('team-create-direct');
    Route::get('/admin/player/{team}/create/', 'PlayerController@create')->name('team-create');
    Route::post('/admin/player/store', 'PlayerController@store')->name('team-store');

 //match
 Route::get('/admin/matches', 'MatchController@index')->name('admin-matches');   
 Route::get('/admin/match/create', 'MatchController@create')->name('admin-match-create'); 
 Route::get('/admin/match/fetch', 'MatchController@fetch')->name('admin-match-fetch'); 
 Route::post('/admin/match/create', 'MatchController@store')->name('admin-match-store'); 
 Route::put('/admin/match/{match}/update', 'MatchController@update')->name('admin-match-update');

 Route::post('/admin/playingteam/store', 'PlayingteamController@store');
 Route::get('/admin/playingteam/create', 'PlayingteamController@create'); 
});