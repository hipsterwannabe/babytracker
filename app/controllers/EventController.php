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

    public function showBottle($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('bottle')->with('baby', $baby);
    }

    public function doBottle($id)
    {
        $bottle = new Feeding();
        $bottle->baby_id = $id;

        $bottle->bottle = true;
        $bottle->start_bottle =
        $bottle->stop_bottle =
        $bottle->bottle_ounces = Input::get('ounces');
        $bottle->notes = Input::get('notes');
        $bottle->save();

        return Redirect::action('EventController@showMenu', $id);

    }

    public function showBreast($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('breast')->with('baby', $baby);
    }

    public function doBreast($id)
    {
        $breast = new Feeding();
        $breast->baby_id = $id;

        $breast->breast = true;
        $breast->start_left =
        $breast->stop_left =
        $breast->start_right =
        $breast->stop_right =
        $breast->notes = Input::get('notes');
        $breast->save();

        return Redirect::action('EventController@showMenu', $id);

    }

}
