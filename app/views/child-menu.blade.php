@extends('layouts.master')

@section('content')

<div class="container">
	
	<!-- content of the view -->
	<h1>Select Child</h1>
	
	<div>
	    @foreach ( Auth::user()->babies as $baby)
	        <a href="/menu/{{$baby->id}}" class="btn btn-primary btn-lg btn-block" role="button">{{ $baby->name }}</a>
	    @endforeach
	</div>

	<a href="{{{ action('EventController@showBaby', Auth::id()) }}}" class="btn btn-block btn-info" role="button">Add Baby</a>

</div>

@stop