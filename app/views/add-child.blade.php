@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Add Child</h1>

    {{ Form::open() }}

    {{ Form::label('name', 'Baby Name:') }}
    {{ Form::text('name', null, array('placeholder' => 'baby name...')) }}




    {{ Form::close() }}



</div>


@stop