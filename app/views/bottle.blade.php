@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Bottle View</h1>
    <div class="col-md-6" id="bottleTimer"></div>
    {{ Form::open(array('action' => array('EventController@doBottle', $baby->id))) }}

    {{ Form::button('Start', array('class' => 'btn btn-primary', 'id' => 'timer')) }}
    
    {{ Form::label('ounces', 'Ounces:') }}
    {{ Form::selectRange('ounces', 0, 10) }}
    
    {{ Form::label('notes', 'Notes') }}
    {{ Form::textarea('notes', null, array('placeholder' => 'feeding notes...')) }}
    <!-- hidden inputs, for start, end times and feeding length -->
    {{ Form::hidden('startNap', null, array('id' => 'beginTime')) }}
    {{ Form::hidden('stopNap', null, array('id' => 'endTime')) }}
    {{ Form::hidden('length', null, array('id' => 'lengthOfBottleFeeding')) }}

    {{ Form::submit('Submit')}}

    {{ Form::close() }}
   
</div>

@stop

@section('bottomscript')
<script type="text/javascript" src="/assets/FlipClock-master/compiled/flipclock.js"></script>

<script>
    //initialize values
    var startBottle = null;
    var stopBottle = null;
    var flipClock = null;
    $(document).ready(function() {
        // Click event logs timestamp and changes button
        // below will be a live event upon a click
        $(document).on('click', "#timer", function() {
        if (startBottle == null && stopBottle == null) {
            startBottle = moment();
            $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
            $(this).text("END FEEDING");
            console.log(startBottle);
            $("#begintime").val(startBottle);
            //timer to go here, using flipclock
            flipClock = $('#bottleTimer').FlipClock({ 
            });
        } else if (startBottle !== null && stopBottle == null) {
            // logs time of stopBottle, disables button
            stopBottle = moment();
            $(this).text("TUMMY'S FULL!");
            $(this).attr("disabled", "disabled");
            console.log(stopBottle);
            $("#endtime").val(stopBottle);
            //stop the flipclock timer
            flipClock.stop();
            var bottleLength = stopBottle.diff(startBottle);
            $("lengthOfBottleFeeding").val(bottleLength);
            console.log(bottleLength);
            }
      });
    });

</script>
@stop
