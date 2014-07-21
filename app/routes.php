<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Login & Logout
Route::get('/', 'HomeController@showLogin');

Route::post('/', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');


// Add new profiles
Route::get('/new-user', 'HomeController@getNewUser');

Route::post('/new-user', 'HomeController@newUser');

Route::get('/add-baby/{id}', 'HomeController@showBaby');

Route::post('/add-baby/{id}', 'HomeController@newBaby');


// Change diaper
Route::get('/diaper/{id}', 'EventController@showDiaper');

Route::post('/diaper/{id}', 'EventController@doDiaper');


// Feedings
Route::get('/bottle/{id}', 'EventController@showBottle');

Route::post('/bottle/{id}', 'EventController@doBottle');

Route::get('/breast/{id}', 'EventController@showBreast');

Route::post('/breast/{id}', 'EventController@doBreast');


// Take a nap
Route::get('/nap/{id}', 'EventController@showNap');

Route::post('/nap/{id}', 'EventController@doNap');


// Show the menu
Route::get('/menu/{id}', 'EventController@showMenu');

Route::get('/menu', function()
{
    if (Auth::check()) {
        return View::make('child-menu');
    }
    else {
        return Redirect::action('HomeController@showLogin');
    }
});

Route::get('/graphs/{id}', function()
{
   return View::make('graphs');
});

Route::get('/about', function()
{
   return View::make('about');
});

Route::get('/baby-stats', function()
{
    return View::make('baby-stats');
});
