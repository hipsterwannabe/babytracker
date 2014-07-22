@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Breast View</h1>

    {{ Form::open(array('action' => array('EventController@doBreast', $baby->id))) }}
    <div class="row">
        <div class="col-md-6">
            <!-- refactored to have one start/stop button -->
           {{ Form::button('Start Left', array('class' => 'btn btn-primary', 'id' => 'leftButton')) }}
        </div>
        
        <div class="col-md-6">
            <!-- refactored to have one start/stop button -->
            {{ Form::button('Start Right', array('class' => 'btn btn-primary', 'id' => 'rightButton')) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="feedingTimer" style="display: inline-block"></div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- switch sides button, invisible at first -->
        {{ Form::button('Switch Sides', array('class' => 'invisible', 'id' => 'switchSides')) }}
    </div>
    {{ Form::label('notes', 'Notes') }}
    {{ Form::textarea('notes', null, array('placeholder' => 'feeding notes...')) }}

    {{ Form::hidden('startLeft', null, array('id' => 'beginLeft')) }}
    {{ Form::hidden('stopLeft', null, array('id' => 'endLeft')) }}

    {{ Form::hidden('startRight', null, array('id' => 'beginRight')) }}
    {{ Form::hidden('stopRight', null, array('id' => 'endRight')) }}

    {{ Form::hidden('totalTime', null, array('id' => 'feedTime')) }}

    {{ Form::submit('Submit')}}

    {{ Form::close() }}
</div>

@stop

@section('bottomscript')
<script type="text/javascript" src="/assets/FlipClock-master/compiled/flipclock.js"></script>

<script>
    //initialize values for left side
    var startLeft = null;
    var stopLeft = null;
    var startRight = null;
    var stopRight = null;
    var flipClock = null;
    var totalTime = null;
    var timeLeft = null;
    var timeRight = null;
    $(document).ready(function() {
        // shows timer at page load
        flipClock = $('#feedingTimer').FlipClock({
            autoStart: false
        });
        // Click event logs timestamp and changes button
        // below will be a live event upon a click
        // block for beginning feeding on left side
        // note to self- try $(this).hide 
        $("#leftButton").on('click', function() {
            if (startLeft == null && stopLeft == null && startRight == null && stopRight == null) {
                startLeft = moment();
                // make right side button invisible
                $("#rightButton").removeClass("btn btn-primary").addClass("invisible");
                $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
                $(this).text("END FEEDING");
                console.log(startLeft);
                $("#beginLeft").val(startLeft);
                flipClock.start();
            } else if (startLeft !== null && stopLeft == null && startRight == null && stopRight == null) {
            // logs time of stopBottle, shows switch/stop buttons
                stopLeft = moment();
                $(this).text("LEFT SIDE DONE");
                $(this).attr("disabled", "disabled");
                console.log(stopLeft);
                $("#endLeft").val(stopLeft);
                //stop the flipclock timer
                flipClock.stop();
                timeLeft = stopLeft.diff(startLeft);
                $("#rightButton").removeClass("invisible").addClass("btn btn-primary");
                $("#rightButton").text("SWITCH SIDES");
                $(document).on('click', "#rightButton", function() {
                    if (startRight == null && stopRight == null) {
                        $("#leftButton").hide;
                        startRight = moment();
                        $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
                        $(this).text("END FEEDING");
                        console.log(startRight);
                        $("#beginRight").val(startRight);
                        // restart clock
                        flipClock.start();
                    } else if (startRight !== null && stopRight == null) {
                        stopRight = moment();
                        $(this).text("TUMMY'S FULL!");
                        $(this).attr("disabled", "disabled");
                        console.log(stopRight);
                        flipClock.stop();
                        $(this).text("TUMMY FULL!");
                        $(this).attr("disabled", "disabled");
                        timeRight = stopRight.diff(startRight);
                        totalTime = timeRight + timeLeft;
                        console.log(totalTime);
                    }
                });
            }
        });
        // block for beginning feeding on right side
        $("#rightButton").on('click', function() {
            if (startLeft == null && stopLeft == null && startRight == null && stopRight == null) {
                startRight = moment();
                // make leftt side button invisible
                $("#leftButton").removeClass("btn btn-primary").addClass("invisible");
                // changes class of clicked right button
                $(this).removeClass("btn-primary").addClass("btn-danger");
                $(this).text("END FEEDING");
                console.log(startRight);
                $("#beginRight").val(startRight);
                flipClock.start();
            } else if (startLeft == null && stopLeft == null && startRight !== null && stopRight == null) {
                // logs time of stopBottle, shows switch/stop buttons
                stopRight = moment();
                $(this).text("RIGHT SIDE DONE");
                $(this).attr("disabled", "disabled");
                console.log(stopRight);
                $("#endRight").val(stopRight);
                //stop the flipclock timer
                flipClock.stop();
                timeRight = stopRight.diff(startRight);
                $("#leftButton").removeClass("invisible").addClass("btn btn-primary");
                $("#leftButton").text("SWITCH SIDES");
                $(document).on('click', "#leftButton", function() {
                    if (startLeft == null && stopLeft == null) {
                        $("#rightButton").hide;
                        startLeft = moment();
                        $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
                        $(this).text("END FEEDING");
                        console.log(startLeft);
                        $("#beginLeft").val(startLeft);
                        // restart clock
                        flipClock.start();
                    } else if (startLeft !== null && stopLeft == null) {
                        stopLeft = moment();
                        $(this).text("TUMMY'S FULL!");
                        $(this).attr("disabled", "disabled");
                        console.log(stopLeft);
                        flipClock.stop();
                        $(this).text("TUMMY FULL!");
                        $(this).attr("disabled", "disabled");
                        timeLeft = stopLeft.diff(startLeft);
                        totalTime = timeRight + timeLeft;
                        console.log(totalTime);
                    }
                });
            }
        });
    });
// <script>

//     // Grab timestamp on click
//     $('#startLeft').click(function() {
//         startLeft = event.timeStamp;
//         console.log(startLeft);
//     });

//     // Grab timestamp on click
//     $('#stopLeft').click(function() {
//         stopLeft = event.timeStamp;
//         console.log(stopLeft);
//     });
//     // Grab timestamp on click
//     $('#startRight').click(function() {
//         startRight = event.timeStamp;
//         console.log(startRight);
//     });

//     // Grab timestamp on click
//     $('#stopRight').click(function() {
//         stopRight = event.timeStamp;
//         console.log(stopRight);
//     });

// </script>

@stop
