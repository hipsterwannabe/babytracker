@extends('layouts.master')


@section('content')
	<div class="container">
		<h1>Nap Form Mockup</h1><br>
	<!-- laravel form helper here -->
	<!-- button to start nap timer -->
	<!-- buttong should change to STOP onclick -->
    
	    <div>
	    	<script>
	    		var startNap = null;
		    	var stopNap = null;
		        $('document').ready(function() {
		            $('#timer').click(function() {
		               startNap = moment();
		               $(this).class = "btn btn-danger";
		            });
		        });
		    </script>
	    	<button type="button" class="btn btn-success" id="timer">START NAP</button>
	    
		</div>
	    <br>
		
		{{ Form::label('notes', 'Notes') }}
		<br>
		{{ Form::textarea('notes', null, array('cols'=>'45', 'rows'=>'10', 'placeholder'=>'Write any notes here.', 'class'=>'wmd-input', 'id'=> 'wmd-input')) }}
		<div>
	    	<button type="button" class="btn btn-primary">{{ Form::submit('Submit') }}</button>
	    
		</div>
	</div>
@stop