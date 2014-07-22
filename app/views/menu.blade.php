@extends('layouts.master')

@section('content')


<div class="container">

    <div class="row">
        <div class="col-lg-6">
            <!-- Baby picture and info -->
            <div class="media pull-left">
                <a href="/baby-stats"><img class="media-object img-responsive" src="{{{ $baby->img_path }}}"></a>
            </div>

            <div class="col-lg-6">
                <h2> {{ $baby->name }} </h2>
                <p>{{ $baby->birth_date }}</p>
                <!-- Select event to log -->
                <div class="btn-group-vertical">
                    <a href="{{{ action('EventController@showDiaper', $baby->id) }}}" class="btn btn-block btn-primary" role="button">Diaper</a>
                    <a href="{{{ action('EventController@showBottle', $baby->id) }}}" class="btn btn-block btn-primary" role="button">Bottle</a>
                    <a href="{{{ action('EventController@showBreast', $baby->id) }}}" class="btn btn-block btn-primary" role="button">Nurse</a>
                    <a href="{{{ action('EventController@showNap', $baby->id) }}}" class="btn btn-block btn-primary" role="button">Sleep</a>
                </div>
            </div>
        </div>
    </div>

</div>

@stop




