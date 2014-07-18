@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Breast View</h1>

    {{ Form::open(array('action' => array('EventController@doBreast', $baby->id))) }}

    {{ Form::label('startLeft', 'Start Left Side') }}
    {{ Form::button('startLeft', array('id' => 'startLeft')) }}

    {{ Form::label('stopLeft', 'Stop Left Side') }}
    {{ Form::button('stopLeft', array('id' => 'stopLeft')) }}

    {{ Form::label('startRight', 'Start Right Side') }}
    {{ Form::button('startRight', array('id' => 'startRight')) }}

    {{ Form::label('stopRight', 'Stop Right Side') }}
    {{ Form::button('stopRight', array('id' => 'stopRight')) }}

    {{ Form::label('notes', 'Notes') }}
    {{ Form::textarea('notes', null, array('placeholder' => 'feeding notes...')) }}

    {{ Form::submit('Submit')}}

    {{ Form::close() }}
</div>

@stop

@section('bottomscript')

<script>

    // Grab timestamp on click
    $('#startLeft').click(function() {
        startLeft = event.timeStamp;
        console.log(startLeft);
    });

    // Grab timestamp on click
    $('#stopLeft').click(function() {
        stopLeft = event.timeStamp;
        console.log(stopLeft);
    });
    // Grab timestamp on click
    $('#startRight').click(function() {
        startRight = event.timeStamp;
        console.log(startRight);
    });

    // Grab timestamp on click
    $('#stopRight').click(function() {
        stopRight = event.timeStamp;
        console.log(stopRight);
    });

</script>

@stop
