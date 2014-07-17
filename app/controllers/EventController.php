<?php

class EventController extends BaseController {

    // public function __construct()
    // {
    //     // call base controller constructor
    //     parent::__construct();

    //     // run auth filter before all methods on this controller except index and show
    //     $this->beforeFilter('auth');
    // }

    public function showDiaper()
    {
        return View::make('diaper');
    }

    public function doDiaper()
    {
        $diaper = new Diaper();
        $diaper->id = Input::get('');
        $diaper->baby_id = Input::get('');

        if (Input::get('type') == '#1') {
            $diaper->number_one == true;
        }
        elseif (Input::get('type') == '#2') {
            $diaper->number_two = true;
            $diaper->consistency = Input::get('consistency');
            $diaper->color = Input::get('color');
        }
        elseif (Input::get('type') == 'both') {
            $diaper->number_one = true;
            $diaper->number_two = true;
            $diaper->consistency = Input::get('consistency');
            $diaper->color = Input::get('color');
        }

        if (Input::get('leak') == 'YES') {
            $diaper->leak = true;
        }

        $diaper->notes = Input::get('notes');
        $diaper->save();
    }



}
