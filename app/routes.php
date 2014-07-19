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
Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

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
