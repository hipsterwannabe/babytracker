<?php

class UserController extends BaseController {

    public function newUser()
    {
        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('new_email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        Auth::login($user);
        return View::make('new-user-menu')->with('user', $user);
    }

    public function showCreateBaby()
    {
        return View::make('add-baby');
    }

    public function newBaby()
    {
        $baby = new Baby();
        $baby->user_id = Auth::id();

        $baby->name = Input::get('name');
        $baby->gender = Input::get('gender');
        $baby->birth_date = Input::get('birth_date');
        $baby->save();

        if (Input::hasFile('image') && Input::file('image')->isValid())
        {
            $baby->addUploadedImage(Input::file('image'));
            $baby->save();

            $maxHeight = 200;
            $maxWidth = 200;

            $newHeight = 0;
            $newWidth = 0;

            $imagePath = public_path() . $baby->img_path;

            // load the image to be manipulated
            $image = new Imagick($imagePath);

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
            $image->writeImage($imagePath);

            // clear memory resources
            $image->clear();
            $image->destroy();
        }
        return Redirect::action('EventController@showMenu', $baby->id);
    }

    public function editBaby($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('update-baby')->with('baby', $baby);
    }

    public function updateBaby($id)
    {
        $baby = Baby::findOrFail($id);


        $baby->name = Input::get('name');
        $baby->gender = Input::get('gender');
        $baby->birth_date = Input::get('birth_date');
        $baby->save();

        if (Input::hasFile('image') && Input::file('image')->isValid()) {
            $baby->addUploadedImage(Input::file('image'));
            $baby->save();

            $maxHeight = 200;
            $maxWidth = 200;

            $newHeight = 0;
            $newWidth = 0;

            $imagePath = public_path() . $baby->img_path;

            // load the image to be manipulated
            $image = new Imagick($imagePath);

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
            $image->writeImage($imagePath);

            // clear memory resources
            $image->clear();
            $image->destroy();

        }

        Session::flash('successMessage', "$baby->name has been updated successfully.");
        return Redirect::action('EventController@showMenu', $id);
        }


}