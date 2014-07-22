@extends('layouts.master')

@section('content')

<style>

	#btnOptions {
		top: 200px;
	}
	h1 {
		text-align: center;
	}

</style>

<div class="container">

    <div class="col-lg-offset-4 col-lg-4">
        <h1>Select Child</h1>
        <div class="btn-group-vertical btn-block" id="btnOptions">
            @foreach ( Auth::user()->babies as $baby)
                <a href="/menu/{{$baby->id}}" class="btn btn-primary btn-lg" role="button">{{ $baby->name }}</a>
            @endforeach
            <a href="{{{ action('UserController@showCreateBaby', Auth::id()) }}}" class="btn btn-info btn-lg" role="button">Add Baby</a>
        </div>
    </div>

</div>

@stop