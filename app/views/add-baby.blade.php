@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Add Baby</h1>

    {{ Form::open(array('action' => array('HomeController@newBaby', $user->id))) }}

    {{ Form::label('name', 'Baby Name:') }}
    {{ Form::text('name', null, array('placeholder' => 'baby name...')) }}

    {{ Form::label('gender', 'Gender:') }}
    {{ Form::select('gender', array('Boy' => 'Boy', 'Girl' => 'Girl')) }}

    {{ Form::label('birth_date', 'Birthday:') }}
    {{ Form::text('birth_date', null, array('placeholder' => 'YYYY-MM-DD')) }}

    {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}


</div>


@stop