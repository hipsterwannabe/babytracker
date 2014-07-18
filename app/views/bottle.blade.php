@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Bottle View</h1>

    {{ Form::open(array('action' => array('EventController@doBottle', $baby->id))) }}

    {{ Form::label('start', 'Start Bottle') }}
    {{ Form::button('start') }}

    {{ Form::label('stop', 'Finish Bottle') }}
    {{ Form::button('stop') }}

    {{ Form::label('ounces', 'Ounces:') }}
    {{ Form::selectRange('ounces', 0, 10) }}

    {{ Form::label('notes', 'Notes') }}
    {{ Form::textarea('notes', null, array('placeholder' => 'feeding notes...')) }}

    {{ Form::submit('Submit')}}

    {{ Form::close() }}
</div>

@stop