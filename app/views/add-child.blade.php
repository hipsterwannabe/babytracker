@extends('layouts.master')

@section('content')
	
	<div class="container">
		<h1>Add Child</h1>
	</div>
	<form action="POST">
		<label>Name: </label>
		<input type="text" placeholder="Name"><br>
		<h2>Gender: </h2><br>
        {{ Form::label('leak', 'M') }}
        {{ Form::radio('leak', 'M') }}
        <br>
        {{ Form::label('leak', 'F') }}
        {{ Form::radio('leak', 'F') }}

		<label>Birth Date: </label>
		<input type="text"><br>
	</form>
@stop