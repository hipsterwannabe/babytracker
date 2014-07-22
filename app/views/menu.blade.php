@extends('layouts.master')

@section('content')

<div class="container">

    <!-- Child Sidebar -->
    <div class="col-lg-offset-3 col-lg-3">
        <div class="row">
            <img src="{{{ $baby->img_path }}}" alt="{{{ $baby->name }}}">
        </div>

        <div class="row">
            <h2>{{{ $baby->name }}}</h2>
        </div>

        <div class="row">
            <h4>{{{ $baby->birth_date }}}</h4>
        </div>
    </div>
    <!-- Child Sidebar -->

    <div class="col-lg-4">
        <div class="btn-group-vertical">
            <a href="{{{ action('EventController@showDiaper', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Diaper</a>
            <a href="{{{ action('EventController@showBottle', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Bottle</a>
            <a href="{{{ action('EventController@showBreast', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Nurse</a>
            <a href="{{{ action('EventController@showNap', $baby->id) }}}" class="btn btn-primary btn-lg" role="button">Sleep</a>
        </div>
    </div>

</div>

@stop




