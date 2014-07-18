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


Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::get('/new-user', 'HomeController@getNewUser');

Route::post('/new-user', 'HomeController@newUser');

Route::get('/diaper/{id}', 'EventController@showDiaper');

Route::post('/diaper/{id}', 'EventController@doDiaper');

Route::get('/bottle/{id}', 'EventController@showBottle');

Route::post('/bottle/{id}', 'EventController@doBottle');

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

Route::get('/graphs', function()
{
   return View::make('graphs');
});

Route::get('/about', function()
{
   return View::make('about');
});

Route::get('/add-child', function()
{
   return View::make('add-child');
});

Route::get('/nap', function()
{
	return View::make('nap');
});

Route::get('/eating', function()
{
	return View::make('eating-prompt');
});

Route::get('/breast', function()
{
	return View::make('breast');
});

Route::get('/baby-stats', function()
{
    return View::make('baby-stats');
});

Route::get('test', function () {

    $maxHeight = 200;
    $maxWidth = 200;

    $newHeight = 0;
    $newWidth = 0;

    $inputFile = public_path() . '/uploads/afterlight.jpeg';
    $outputFile = public_path() . '/uploads/afterlight-small.jpeg';

    // load the image to be manipulated
    $image = new Imagick($inputFile);

    // get the current image dimensions
    $currentWidth = $image->getImageWidth();
    $currentHeight = $image->getImageHeight();

    // determine what the new height and width should be based on the type of photo
    if ($currentWidth > $currentHeight)
    {
        // landscape photo
        // width should be resized to max and height should be resized proportionally
        $newWidth = $maxWidth;
        $newHeight = ceil($currentHeight * ($newWidth / $currentWidth));
    }
    else if ($currentHeight > $currentWidth)
    {
        // portrait photo
        // height should be resized to max and width should be resized proportionally
        $newHeight = $maxHeight;
        $newWidth = ceil($currentWidth * ($newHeight / $currentHeight));
    }
    else
    {
        // square photo
        // resize image to max dimensions
        $newHeight = $newWidth = $maxHeight;
    }

    // perform the image resize
    $image->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, true);

    // write out the new image
    $image->writeImage($outputFile);

    // clear memory resources
    $image->clear();
    $image->destroy();

    return 'Done';

});
