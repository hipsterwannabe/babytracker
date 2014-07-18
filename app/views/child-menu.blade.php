@extends('layouts.master')

@section('content')



<div class="container">
	
	<!-- content of the view -->
	<h2 id="selectChildHeader">Select Child</h2>
	<hr>

	<div>
	    @foreach ( Auth::user()->babies as $baby)
	        <a href="/menu/{{$baby->id}}" class="btn btn-primary btn-lg btn-block" role="button">{{ $baby->name }}</a>
	    @endforeach
	</div>

	<form>
	    <a id="addChild" class="btn btn-lg btn-block btn-warning" href="add-child">Add Child</a>
	</form>

</div>


@stop