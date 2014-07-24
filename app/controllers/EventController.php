<?php

class EventController extends BaseController {

    public function __construct()
    {
        // call base controller constructor
        parent::__construct();

        // run auth filter before all methods on this controller
        $this->beforeFilter('auth.basic');

        $this->beforeFilter(function($route) {
            $babyId = $route->getParameter('id');

            // look up baby by ID
            // check that baby->user->id == Auth::id()
            // if not, kick that hacker out

            $baby = Baby::findOrFail($babyId);
            if ($baby->user->id != Auth::id()) {
                Session::flash('errorMessage', "You don't have access to that.");
                return Redirect::to('/menu');
            }
        });

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

    public function showCharts($id)
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

        $naps = $baby->naps()->orderBy('start', 'ASC')->get();
        foreach ($naps as $nap)
        {
            $napData[] = [
                $nap->start->timestamp * 1000,
                $nap->end->diffInSeconds($nap->start)
            ];
        }
        // $firstNap = array_first($napData)
        // $napData = join($napData, ',');
        // building feeding data for graph

        $feedingData = array();
        $feedings = $baby->feedings()->orderBy('created_at', 'ASC')->get();

        foreach ($feedings as $feeding) {
            // grabbing bottle data
            if ($feeding->bottle){
                array_push($feedingData, [
                        $feeding->start_bottle->timestamp * 1000,
                        $feeding->stop_bottle->diffInSeconds($feeding->start_bottle)
                    ]
                );
            } elseif ($feeding->breast) {
                //grabbing nursing data
                if (isset($feeding->start_left) && isset($feeding->start_right)) {
                        if (($feeding->start_left) < ($feeding->start_right)) {
                            array_push($feedingData, [
                                $feeding->start_left->timestamp * 1000,
                                $feeding->stop_right->diffInSeconds($feeding->start_left)
                                ]
                            );
                    } else {
                        array_push($feedingData, [
                            $feeding->start_right->timestamp * 1000,
                            $feeding->stop_left->diffInSeconds($feeding->start_right)
                            ]
                        );
                    }
                }
            } elseif (isset($feeding->start_left)) {
                array_push($feedingData, [
                    $feeding->start_left->timestamp * 1000,
                    $feeding->stop_left->diffInSeconds($feeding->start_left)
                    ]
                );
            } elseif (isset($feeding->start_right)) {
                array_push($feedingData, [
                    $feeding->start_right->timestamp * 1000,
                    $feeding->stop_right->diffInSeconds($feeding->start_right)
                    ]
                );
            }                
        }

        //  building changing data for graph
        $diaperData = array();

        $diapers = $baby->diapers()->orderBy('created_at', 'ASC')->get();

        foreach ($diapers as $diaper) {
            if ($diaper->number_one && $diaper->number_two){
                array_push($diaperData, [
                    $diaper->created_at->timestamp * 1000, 3
                    ]
                );
            } elseif ($diaper->number_one){
                array_push($diaperData, [
                    $diaper->created_at->timestamp * 1000, 1
                    ]);
            } elseif ($diaper->number_two) {
                array_push($diaperData, [
                    $diaper->created_at->timestamp * 1000, 2
                    ]);
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
