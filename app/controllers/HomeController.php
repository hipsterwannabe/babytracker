<?php

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function showLogin()
    {
        return View::make('login');
    }

    public function doLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password), Input::has('remember')))
        {
            Session::flash('successMessage', 'You have logged in successfully');
            return Redirect::to('/menu');
        }
        else
        {
            Session::flash('errorMessage', 'Login credentials not valid.');
            return Redirect::action('HomeController@showLogin')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::action('HomeController@showLogin');
    }

}
