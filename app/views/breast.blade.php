@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Breast View</h1>

    {{ Form::open(array('action' => array('EventController@doBreast', $baby->id))) }}
    <div class="row">
        <div class="col-md-6">
            <!-- refactored to have one start/stop button -->
           {{ Form::button('Start Left', array('class' => 'btn btn-success', 'id' => 'leftButton')) }}
        </div>
        
        <div class="col-md-6">
            <!-- refactored to have one start/stop button -->
            {{ Form::button('Start Right', array('class' => 'btn btn-success', 'id' => 'rightButton')) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="leftTimer" style="display: inline-block"></div>
            <div id="rightTimer" style="display: inline-block"></div>
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
    $(document).ready(function() {
        // Click event logs timestamp and changes button
        // below will be a live event upon a click
        // block for beginning feeding on left side
        // note to self- try $(this).hide 
        $("#leftButton").on('click', function() {
            if (startLeft == null && stopLeft == null && startRight == null && stopRight == null) {
                startLeft = moment();
                // make right side button invisible
                $("#rightButton").removeClass("btn btn-success").addClass("invisible");
                $(this).removeClass("btn btn-success").addClass("btn btn-danger");
                $(this).text("END FEEDING");
                console.log(startLeft);
                $("#beginLeft").val(startLeft);
                //timer to go here, using flipclock
                flipClock = $('#leftTimer').FlipClock({});
            } else if (startLeft !== null && stopLeft == null && startRight == null && stopRight == null) {
            // logs time of stopBottle, shows switch/stop buttons
                stopLeft = moment();
                $(this).text("LEFT SIDE DONE");
                $(this).attr("disabled", "disabled");
                console.log(stopLeft);
                $("#endLeft").val(stopLeft);
                //stop the flipclock timer
                flipClock.stop();
                $("#rightButton").removeClass("invisible").addClass("btn btn-success");
                $("#rightButton").text("SWITCH SIDES");
                $(document).on('click', "#rightButton", function() {
                    if (startRight == null && stopRight == null) {
                        $("#leftButton").hide;
                        startRight = moment();
                        $(this).removeClass("btn btn-success").addClass("btn btn-danger");
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
                    }
                });
            }
        });
        // block for beginning feeding on right side
        $("#rightButton").on('click', function() {
            if (startLeft == null && stopLeft == null && startRight == null && stopRight == null) {
                startRight = moment();
                // make leftt side button invisible
                $("#leftButton").removeClass("btn btn-success").addClass("invisible");
                // changes class of clicked right button
                $(this).removeClass("btn-success").addClass("btn-danger");
                $(this).text("END FEEDING");
                console.log(startRight);
                $("#beginRight").val(startRight);
                //timer to go here, using flipclock
                flipClock = $('#rightTimer').FlipClock({});
            } else if (startLeft == null && stopLeft == null && startRight !== null && stopRight == null) {
                // logs time of stopBottle, shows switch/stop buttons
                stopRight = moment();
                $(this).text("RIGHT SIDE DONE");
                $(this).attr("disabled", "disabled");
                console.log(stopRight);
                $("#endRight").val(stopRight);
                //stop the flipclock timer
                flipClock.stop();
                $("#leftButton").removeClass("invisible").addClass("btn btn-success");
                $("#leftButton").text("SWITCH SIDES");
                $(document).on('click', "#leftButton", function() {
                    if (startLeft == null && stopLeft == null) {
                        $("#rightButton").hide;
                        startLeft = moment();
                        $(this).removeClass("btn btn-success").addClass("btn btn-danger");
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
