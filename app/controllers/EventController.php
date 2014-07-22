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
        $bottle->start_bottle = Input::get('beginTime');
        $bottle->stop_bottle = Input::get('endTime');
        $bottle->bottle_length = Input::get('length');
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
        $breast->start_left = Input::get('beginLeft');
        $breast->stop_left = Input::get('endLeft');
        $breast->start_right = Input::get('beginRight');
        $breast->stop_right = Input::get('endRight');
        $breast->nursing_time = Input::get('feedTime');
        $breast->notes = Input::get('notes');
        $breast->save();

        return Redirect::action('EventController@showMenu', $id);

    }

    public function showNap($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('nap')->with('baby', $baby);
    }

    public function doNap($id)
    {
        $nap = new Nap();
        $nap->baby_id = $id;

        //date_default_timezone_set('America/Chicago');
        $startNap = date('Y-m-d H:i:s', strtotime(Input::get('startNap')));
        $stopNap = date('Y-m-d H:i:s', strtotime(Input::get('stopNap')));
        $napLength = Input::get('lengthOfNap');
        $nap->start = $startNap;
        $nap->end = $stopNap;
        $nap->length = $napLength/1000;
        $nap->notes = Input::get('notes');
        $nap->save();

        return Redirect::action('EventController@showMenu', $id);

    }

    public function showGraphs($id)
    {
        $baby = Baby::findOrFail($id);
        // use this to convert time
        function time_to_decimal($time) {
            $timeArr = explode(':', $time);
            $decTime = ($timeArr[0]*60) + ($timeArr[1]) + ($timeArr[2]/60);

            return $decTime;
        }
        // building nap data for graph
        $napData = array();
        $naps = $baby->naps;

        foreach ($naps as $nap)
        {

            $napData[] = "['" . date('Y-m-d H:i:s', strtotime($nap->start)) . "'," . time_to_decimal($nap->length) . "]";
        }

        $napData = join($napData, ',');
        // building feeding data for graph

        $feedingData = array();
        $feedings = $baby->feedings;

        foreach ($feedings as $feeding) {
            if ($feedings->bottle){
                $feedingData[] = "['" . date('Y-m-d H:i:s', strtotime($feedings->start_bottle)) . "'," . time_to_decimal($feedings->bottle_length) . "]";
            } else {

            }
        }

        $data = array(
            'baby' => $baby,
            'napData' => $napData,
        );

        return View::make('graphs')->with($data);
    }

}
