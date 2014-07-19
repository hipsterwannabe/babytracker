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
            return Redirect::action('HomeController@showLogin');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::action('HomeController@showLogin');
    }

    public function getNewUser()
    {
        return View::make('new-user');
    }

    public function newUser()
    {
        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('new_email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        return Redirect::action('HomeController@showBaby');
    }

    public function showBaby($id)
    {
        $user = User::findOrFail($id);
        return View::make('add-baby')->with('user', $user);
    }

    public function newBaby($id)
    {
        $baby = new Baby();
        $baby->user_id = $id;

        $baby->name = Input::get('name');
        $baby->gender = Input::get('gender');
        $baby->birth_date = Input::get('birth_date');
        $baby->save();

        return Redirect::to('/menu');
    }

}
