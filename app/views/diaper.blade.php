@extends('layouts.master')

@section('content')

<!-- Add labels to the form!! -->

<div class="container">
    <h2>Diaper Change! </h2>

    <h2>What was inside?</h2>

    {{ Form::open(array('action' => array('EventController@doDiaper', $baby->id))) }}

    {{ Form::select('type', array('number_one' => '#1', 'number_two' => '#2', 'both' => 'Both')) }}

    <h2>What consistency was the poop?</h2>
    {{ Form::select('consistency', array('0' => '-----',  '1' => 'Loose', '2' => 'Seedy', '3' => 'Thick', '4' => 'Sticky', '5' => 'Chunky', '6' => 'Hard' )) }}

    <h2>What color was the poop?</h2>
    {{ Form::select('color', array('0' => '-----',  '1' => 'White', '2' => 'Beige', '3' => 'Light Green', '4' => 'Dark Green', '5' => 'Light Brown', '6' => 'Dark Brown' )) }}

    <h2>Did the diaper leak?</h2>
    {{ Form::label('leak', 'YES') }}
    {{ Form::radio('leak', 'YES') }}

    {{ Form::label('leak', 'NO') }}
    {{ Form::radio('leak', 'NO') }}

    {{ Form::label('notes', 'Notes') }}
    {{ Form::textarea('notes', null, array('placeholder' => 'diaper notes...')) }}

    {{ Form::submit('SUBMIT', array('class' => 'btn btn-info')) }}

    {{ Form::close() }}
</div>

@stop