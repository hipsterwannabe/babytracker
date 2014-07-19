@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Add Baby</h1>

    {{ Form::open(array('action' => array('HomeController@newBaby', $user->id))) }}

    {{ Form::label('name', 'Baby Name:') }}
    {{ Form::text('name', null, array('placeholder' => 'baby name...')) }}

    {{ Form::label('gender', 'Gender:') }}
    {{ Form::select('gender', array('Boy', 'Girl')) }}

    {{ Form::label('birth_date') }}
    {{ Form::date('birth_date', array('placeholder' => 'YYYY-MM-DD')) }}

    {{ Form::submit('Submit') }}

    {{ Form::close() }}



</div>


@stop