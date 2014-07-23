<?php

class EventController extends BaseController {

    public function __construct()
    {
        // call base controller constructor
        parent::__construct();

        // run auth filter before all methods on this controller
        $this->beforeFilter('auth.basic');

    }

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

        if (Input::get('leak') == 'Yes') {
            $diaper->leak = true;
        }

        $diaper->notes = Input::get('notes');
        $diaper->save();

        Session::flash('successMessage', 'Diaper change charted.');
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
        $bottle->start_bottle = date('Y-m-d H:i:s', strtotime(Input::get('start_bottle')));
        $bottle->stop_bottle = date('Y-m-d H:i:s', strtotime(Input::get('end_bottle')));
        $length = Input::get('length');
        $bottle->bottle_length = $length / 1000;
        $bottle->bottle_ounces = Input::get('ounces');
        $bottle->notes = Input::get('notes');
        $bottle->save();

        Session::flash('successMessage', 'Bottle feeding charted.');
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
        $breast->start_left = date('Y-m-d H:i:s', strtotime(Input::get('start_left')));
        $breast->stop_left = date('Y-m-d H:i:s', strtotime(Input::get('end_left')));
        $breast->start_right = date('Y-m-d H:i:s', strtotime(Input::get('start_right')));
        $breast->stop_right = date('Y-m-d H:i:s', strtotime(Input::get('end_right')));
        $length = Input::get('length');
        $breast->nursing_time = $length / 1000;
        $breast->notes = Input::get('notes');
        $breast->save();


        Session::flash('successMessage', 'Nursing session charted.');
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

        $nap->start = date('Y-m-d H:i:s', strtotime(Input::get('start_nap')));
        $nap->end = date('Y-m-d H:i:s', strtotime(Input::get('end_nap')));
        $length = Input::get('length');
        $nap->length = $length / 1000;
        $nap->notes = Input::get('notes');
        $nap->save();

        Session::flash('successMessage', 'Nap charted.');
        return Redirect::action('EventController@showMenu', $id);

    }

    public function showStats($id)
    {
        $baby = Baby::findOrFail($id);
        return View::make('baby-stats')->with('baby', $baby);
    }

    public function doStats($id)
    {
        $stat = new BabyStat();
        $stat->baby_id = $id;

        $stat->pounds = Input::get('pounds');
        $stat->ounces = Input::get('ounces');
        $stat->length = Input::get('length');
        $stat->head = Input::get('head');

        $stat->save();

        Session::flash('successMessage', 'Growth charted.');
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
        //  building changing dats for graph
        $diaperData = array();
        $diapers = $baby->diapers;

        foreach ($diapers as $diaper) {
            if (number_one && number_two){
                $diaperData[] = "['3', '" . date('Y-m-d H:i:s', strtotime($diapers->created_at)) . "]";
            } elseif (number_one){
                $diaperData[] = "['1', '" . date('Y-m-d H:i:s', strtotime($diapers->created_at)) . "]";
            } elseif (number_two) {
                $diaperData[] = "['2', '" . date('Y-m-d H:i:s', strtotime($diapers->created_at)) . "]";
            }
        }
        $data = array(
            'baby' => $baby,
            'napData' => $napData,
            'feedingData' => $feedingData,
            'diaperData' => $diaperData
        );

        return View::make('graphs')->with($data);
    }

}
