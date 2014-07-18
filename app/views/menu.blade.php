@extends('layouts.master')

@section('content')

    <style>

        .babyImage {
            text-align: center;
        }

    </style>

    <div class="container">

        <h1>Main Menu</h1>

        <!-- Baby picture and info -->
        <div class="featurette">
            <div class="babyImage featurette-image img-circle pull-left">
                <a href="baby-stats"><img class="img-circle" src="/assets/img/baby-face.jpg"></a><br>
                <p class="text-muted">click to edit info</p>
            </div>
            <!-- use logic to display info based on baby id instead of hard-code info -->
            <h2 class="featurette-heading"> {{ $baby->name }} <span class="text-muted">other info.</span></h2>
        </div>

        <div class="btn-group-vertical">
            <a href="{{{ action('EventController@showDiaper', $baby->id) }}}" class="btn btn-block btn-info" role="button">Diaper</a>
            <a href="{{{ action('EventController@showBottle', $baby->id) }}}" class="btn btn-block btn-info" role="button">Bottle</a>
            <a href="{{{ action('EventController@showBreast', $baby->id) }}}" class="btn btn-block btn-info" role="button">Nurse</a>
            <a href="#" class="btn btn-block btn-info" role="button">Sleep</a>
        </div>
    </div>

@stop




