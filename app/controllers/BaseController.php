<?php

class BaseController extends Controller {

    // public function __construct()
 //    {

 //        // run auth filter before all methods on this controller except index and show
 //        $this->beforeFilter('auth.basic', array('except' => array('login')));

 //    }
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

}
