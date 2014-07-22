@extends('layouts.master')

@section('content')

<div class="container">

    <!-- Event Sidebar -->
    <div class="col-lg-3">
        <div class="row">
            <img src="{{{ $baby->img_path }}}" alt="">
        </div>

        <div class="row">
            <h2>{{{ $baby->name }}}</h2>
        </div>
    </div>
    <!-- Event Sidebar -->

    <div class="col-lg-offset-1 col-lg-8">

        <div class="row">
            <div class="col-lg-4">
                <h3>Bottle Feeding</h3>
            </div>
        </div>

        <div class="well well-sm">
            <div class="row">
                <div class="col-lg-6" id="bottleTimer"></div>
            </div>

            {{ Form::open(array('action' => array('EventController@doBottle', $baby->id))) }}

            <div class="row">
                <div class="col-lg-offset-2 col-lg-1">
                    {{ Form::button('Start', array('class' => 'btn btn-primary', 'id' => 'timer')) }}
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1">
                        {{ Form::label('ounces', 'Ounces:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::selectRange('ounces', 1, 10) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1">
                        {{ Form::label('notes', 'Notes:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::textarea('notes', null, array('class' => 'form-control', 'rows' => '3', 'cols' => '6', 'placeholder' => 'feeding notes...')) }}
                    </div>
                </div>
            </div>

            <!-- hidden inputs, for start and end times -->
            {{ Form::hidden('start_bottle', null, array('id' => 'beginTime')) }}
            {{ Form::hidden('end_bottle', null, array('id' => 'endTime')) }}

            <hr>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-1">
                        {{ Form::submit('Submit', array('class' => 'btn btn-info'))}}
                        {{ Form::hidden('length', null, array('id' => 'lengthOfBottleFeeding')) }}
                    </div>
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>

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
            $("#beginTime").val(startBottle);
            //timer to go here, using flipclock
            flipClock = $('#bottleTimer').FlipClock({
            });
        } else if (startBottle !== null && stopBottle == null) {
            // logs time of stopBottle, disables button
            stopBottle = moment();
            $(this).text("TUMMY'S FULL!");
            $(this).attr("disabled", "disabled");
            console.log(stopBottle);
            $("#endTime").val(stopBottle);
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
