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

        if (Input::hasFile('image') && Input::file('image')->isValid())
        {
            $baby->addUploadedImage(Input::file('image'));
            $baby->save();
        
            if (Input::hasFile('image') && Input::file('image')->isValid()) 
            {
                $maxHeight = 100;
                $maxWidth = 100;

                $newHeight = 0;
                $newWidth = 0;

                $uploadedImage = Input::file('image');

                $inputFile = $uploadedImage->getRealPath();
                $imageName = $baby->name . '-' . $uploadedImage->getClientOriginalName();
                $outputFile = public_path() . '/' . 'baby_profiles' . '/' . $imageName;


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
                elseif ($currentHeight > $currentWidth)
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
            }
        }
        return Redirect::to('/menu');
    }
}
