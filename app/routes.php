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

// Login, Create New User, & Logout
Route::get('/', 'HomeController@showLogin');

Route::post('/', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');


// Add new profiles
Route::post('/new-user', 'UserController@newUser');

Route::get('/add-baby', 'UserController@showCreateBaby');

Route::post('/add-baby', 'UserController@newBaby');

Route::get('/update/{id}', 'UserController@editBaby');

Route::post('/update/{id}', 'UserController@updateBaby');


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


// Add growth stats
Route::get('/growth/{id}', 'EventController@showStats');

Route::post('/growth/{id}', 'EventController@doStats');


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

Route::get('/charts/{id}', 'EventController@showCharts');

Route::get('/about', function()
{
   return View::make('about');
});

Route::get('/dummy', function()
{
    return View::make('dummy');
});
