<?php

class EventController extends BaseController {

    public function showMenu($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('menu')->with('baby', $baby);
    }

    public function showDiaper($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('diaper')->with('baby', $baby);
    }

    public function doDiaper($id)
    {
        $diaper = new Diaper();
        $diaper->baby_id = $id;

        if (Input::get('type') == 'number_one') {
            $diaper->number_one = true;
        }
        elseif (Input::get('type') == 'number_two') {
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

        return Redirect::action('EventController@showMenu', $id);
    }

}
