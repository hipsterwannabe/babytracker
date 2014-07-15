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

Route::get('/', function()
{
    return View::make('index');
});

Route::get('/nap', function()
{
	return View::make('nap');
});

Route::get('/eating-prompt', function()
{
	return View::make('eating-prompt');
});

Route::get('/bottle', function()
{
	return View::make('bottle');
});

Route::get('/breast', function()
{
	return View::make('breast');
});
