@extends('layouts.master')

@section('content')

<style>

    #btnOptions {
        top: 200px;
    }
    h1, p {
        text-align: center;
    }

</style>

<div class="container">

    <div class="col-lg-offset-4 col-lg-4">
        <h1> {{ $baby->name }} </h1>
        <p>{{ $baby->birth_date }}</p>
        <div class="btn-group-vertical btn-block" id="btnOptions">
            <a href="{{{ action('EventController@showDiaper', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Diaper</a>
            <a href="{{{ action('EventController@showBottle', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Bottle</a>
            <a href="{{{ action('EventController@showBreast', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Nurse</a>
            <a href="{{{ action('EventController@showNap', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Sleep</a>            
        </div>
    </div>

</div>

@stop




