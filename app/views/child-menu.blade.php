@extends('layouts.master')

@section('content')

<div class="container">

    <h1>Select Child:</h1>

    <br>

    @foreach ( Auth::user()->babies as $baby)
        <div class="col-lg-4">
            <div class="row">
                <img src="{{{ $baby->img_path }}}" alt="{{{ $baby->name }}}">
            </div>
            <br>
            <div class="row">
                @if ($baby->gender == 'Boy')
                    <a href="/menu/{{$baby->id}}" class="btn btn-success btn-lg" role="button">{{ $baby->name }}</a>
                @else
                    <a href="/menu/{{$baby->id}}" class="btn btn-info btn-lg" role="button">{{ $baby->name }}</a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="col-lg-4">
        <div class="row">
            <img src="/baby_profiles/7-red_panda.jpg" alt="Add Baby">
        </div>
        <br>
        <div class="row">
            <a href="{{{ action('UserController@showBaby', Auth::id()) }}}" class="btn btn-danger btn-lg" role="button">Add Baby</a>
        </div>
    </div>

</div>

@stop