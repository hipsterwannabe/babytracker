@extends('layouts.master')

@section('topscript')

<link rel="stylesheet" type="text/css" href="/assets/FlipClock-master/compiled/flipclock.css">

@stop

@section('content')

<div class="container">

    <h1>Naptime</h1>

    <div class="col-md-10" id="napTimer"></div>

    {{ Form::open(array('action' => array('EventController@doNap', $baby->id))) }}

    {{ Form::button('Start', array('class' => 'btn btn-primary', 'id' => 'timer')) }}

    {{ Form::label('notes', 'Notes') }}
    {{ Form::textarea('notes', null, array('placeholder' => 'Nap notes...')) }}

    {{ Form::hidden('start_nap', null, array('id' => 'beginTime')) }}

    {{ Form::hidden('end_nap', null, array('id' => 'endTime')) }}

    {{ Form::hidden('length', null, array('id' => 'napLength')) }}

    {{ Form::submit('Submit', array('class' => ('btn btn-primary'))) }}

    {{ Form::close() }}

</div>

@stop

@section('bottomscript')

<script type="text/javascript" src="/assets/FlipClock-master/compiled/flipclock.js"></script>

<script>
    // Initialize values
    var startNap = null;
    var stopNap = null;
    var flipClock = null;
    $(document).ready(function() {
        //Shows timer on page load
        flipClock = $('#napTimer').FlipClock({
            autoStart: false
        });
        // Click event logs timestamp and changes button
        $(document).on('click', "#timer", function() {
            if (startNap == null && stopNap == null) {
                startNap = moment();
                $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
                $(this).text("Stop Nap");
                console.log(startNap);
                $("#beginTime").val(startNap);
                flipClock.start();

            } else if (startNap !== null && stopNap == null) {
                // logs time of stopNap, disables button
                stopNap = moment();
                $(this).text("Wakey! Wakey!");
                $(this).attr("disabled", "disabled");
                console.log(stopNap);
                $("#endTime").val(stopNap);
                //stop the flipclock timer
                flipClock.stop();
                var napLength = stopNap.diff(startNap);
                console.log(napLength);
                $("#napLength").val(napLength);
            }
        });
    });

</script>

@stop