@extends('layouts.master')

@section('content')

<div class="container">

    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h3>Nursing Session</h3>
            </div>

            <div class="widget-body">

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div id="feedingTimer"></div>
                        <div id="leftTimer"></div>
                        <div id="rightTimer"></div>
                    </div>
                </div>

                {{ Form::open(array('action' => array('EventController@doBreast', $baby->id), 'class' => 'form-horizontal')) }}

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <!-- refactored to have one start/stop button -->
                        {{ Form::button('Start Left', array('class' => 'btn btn-success', 'id' => 'leftButton')) }}
                        <!-- refactored to have one start/stop button -->
                        {{ Form::button('Start Right', array('class' => 'btn btn-success', 'id' => 'rightButton')) }}
                        <!-- switch sides button, invisible at first -->
                        {{ Form::button('Switch Sides', array('class' => 'invisible', 'id' => 'switchSides')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('notes', 'Notes', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::textarea('notes', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'feeding notes...')) }}
                    </div>
                </div>

                <div class="form-group">
                    <!-- Hidden inputs for start and end times -->
                    {{ Form::hidden('start_left', null, array('id' => 'beginLeft')) }}
                    {{ Form::hidden('end_left', null, array('id' => 'endLeft')) }}

                    {{ Form::hidden('start_right', null, array('id' => 'beginRight')) }}
                    {{ Form::hidden('end_right', null, array('id' => 'endRight')) }}

                    {{ Form::hidden('length', null, array('id' => 'feedingLength')) }}
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {{ Form::submit('Submit', array('class' => 'btn btn-warning')) }}
                    </div>
                </div>

                {{ Form::close() }}

           </div>

           <div class="widget-foot">

           </div>

        </div>

    </div>

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
    var timeLeft = null;
    var timeRight = null;
    var totalTime = null;
    $(document).ready(function() {
        //Shows timer at page load
        flipClock = $('#feedingTimer').FlipClock({
            autoStart: false
        });
        // Click event logs timestamp and changes button
        $(document).on('click', "#leftButton", function() {
            if (startLeft == null && stopLeft == null && startRight == null && stopRight == null) {
                startLeft = moment();
                // make right side button invisible
                $("#rightButton").removeClass("btn btn-success").addClass("invisible");
                $(this).removeClass("btn btn-success").addClass("btn btn-danger");
                $(this).text("Stop Left Side.");
                $("#beginLeft").val(startLeft);
                // Flipclock Timer
                flipClock.start();
            } else if (startLeft !== null && stopLeft == null && startRight == null && stopRight == null) {
                // Logs time of stopBottle, shows switch/stop buttons
                stopLeft = moment();
                $(this).text("Left Side Done.");
                $(this).attr("disabled", "disabled");
                $("#endLeft").val(stopLeft);
                // Stop the timer
                flipClock.stop();
                timeLeft = stopLeft.diff(startLeft);
                totalTime = timeLeft;
                $("#feedingLength").val(totalTime);
                $("#rightButton").removeClass("invisible").addClass("btn btn-success");
                $("#rightButton").text("Switch Sides.");
                $(document).on('click', "#rightButton", function() {
                    if (startRight == null && stopRight == null) {
                        $("#leftButton").hide;
                        startRight = moment();
                        $(this).removeClass("btn btn-success").addClass("btn btn-danger");
                        $(this).text("Stop Right Side.");
                        $("#beginRight").val(startRight);
                        // Restart timer
                        flipClock.start();
                    } else if (startRight !== null && stopRight == null) {
                        stopRight = moment();
                        $(this).text("Tummy's Full!");
                        $(this).attr("disabled", "disabled");
                        $('#endRight').val(stopRight);
                        // Stop the timer
                        flipClock.stop();
                        timeRight = stopRight.diff(startRight);
                        totalTime = timeRight + timeLeft;
                        $("#feedingLength").val(totalTime);
                    }
                });
            }
        });
        // block for beginning feeding on right side
        $(document).on('click', "#rightButton", function() {
            if (startLeft == null && stopLeft == null && startRight == null && stopRight == null) {
                startRight = moment();
                // Make leftt side button invisible
                $("#leftButton").removeClass("btn btn-success").addClass("invisible");
                // Changes class of clicked right button
                $(this).removeClass("btn-success").addClass("btn-danger");
                $(this).text("Stop Right Side.");
                $("#beginRight").val(startRight);
                flipClock.start();
            } else if (startLeft == null && stopLeft == null && startRight !== null && stopRight == null) {
                // Logs time of stopBottle, shows switch/stop buttons
                stopRight = moment();
                $(this).text("Right Side Done.");
                $(this).attr("disabled", "disabled");
                $("#endRight").val(stopRight);
                // Stop timer
                flipClock.stop();
                timeRight = stopRight.diff(startRight);
                totalTime = timeRight;
                $("#feedingLength").val(totalTime);
                $("#leftButton").removeClass("invisible").addClass("btn btn-success");
                $("#leftButton").text("Switch Sides.");
                $(document).on('click', "#leftButton", function() {
                    if (startLeft == null && stopLeft == null) {
                        $("#rightButton").hide;
                        startLeft = moment();
                        $(this).removeClass("btn btn-success").addClass("btn btn-danger");
                        $(this).text("Stop Left Side.");
                        $("#beginLeft").val(startLeft);
                        // Restart Timer
                        flipClock.start();
                    } else if (startLeft !== null && stopLeft == null) {
                        stopLeft = moment();
                        $(this).text("Tummy's Full!");
                        $(this).attr("disabled", "disabled");
                        $('#endLeft').val(stopLeft);
                        // Stop the timer
                        flipClock.stop();
                        timeLeft = stopLeft.diff(startLeft);
                        totalTime = timeRight + timeLeft;
                        $("#feedingLength").val(totalTime);
                    }
                });
            }
        });
    });
</script>

@stop
