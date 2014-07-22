@extends('layouts.master')

@section('content')

<div class="container">

    <div class="col-lg-offset-4 col-lg-4">
        <h1>Select Child:</h1>
        <div class="btn-group-vertical">
            @foreach ( Auth::user()->babies as $baby)
                @if ($baby->gender == 'Boy')
                    <a href="/menu/{{$baby->id}}" class="btn btn-success btn-lg" role="button">{{ $baby->name }}</a>
                @else
                    <a href="/menu/{{$baby->id}}" class="btn btn-info btn-lg" role="button">{{ $baby->name }}</a>
                @endif
            @endforeach
            <a href="{{{ action('UserController@showBaby', Auth::id()) }}}" class="btn btn-danger btn-lg" role="button">Add Baby</a>
        </div>
    </div>

</div>

@stop