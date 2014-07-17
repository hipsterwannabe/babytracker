@extends('layouts.master')

@section('topscript')
<link rel="stylesheet" type="text/css" href="css/jquery.countdown.css"> 
@stop

@section('content')
	<div class="container">
		<h1>Nap Form Mockup</h1><br>
	<!-- laravel form helper here -->
	<!-- button to start nap timer -->
	<!-- buttong should change to STOP onclick -->
    
	    <div>
	    	<div class="row">
	    		<div class="col-md-2">
	    		<button type="button" class="btn btn-success" id="timer">START NAP</button>
	    		</div>
	    		<div class="col-md-2" id="napTimer"></div>
			</div>
	    <br>
		
		{{ Form::label('notes', 'Notes') }}
		<br>
		{{ Form::textarea('notes', null, array('cols'=>'45', 'rows'=>'10', 'placeholder'=>'Write any notes here.', 'class'=>'wmd-input', 'id'=> 'wmd-input')) }}
		<input id="begintime" type="hidden" name="startNap" value="">
		<input id="endtime" type="hidden" name="stopNap" value="">
		<div>
	    	<button type="button" class="btn btn-primary">{{ Form::submit('Submit') }}</button>
	    
		</div>
	</div>
@stop

@section('bottomscript')
<script type="text/javascript" src="js/jquery.plugin.js"></script> 
<script type="text/javascript" src="js/jquery.countdown.js"></script>

<script>
	var startNap = null;
	var stopNap = null;
	var flipClock = null;
    $(document).ready(function() {
    	// Click event logs timestamp and changes button
    	// .click is being phased out
    	// below will be a live event upon a click
    	$(document).on('click', "#timer", function() {

    		if (startNap == null && stopNap == null) {
    			startNap = moment();
               	$(this).removeClass("btn btn-success").addClass("btn btn-danger");
               	$(this).text("STOP NAP");
               	console.log(startNap);

               	$("#begintime").val(startNap);
               	//timer to go here, using flipclock
               	//flipClock = $("#napTimer").FlipClock({

               	});
    		} else if (startNap !== null && stopNap == null) {
    			stopNap = moment();
    			$(this).text("Wakey Wakey!");
    			$(this).attr("disabled", "disabled");
    			console.log(stopNap);
    			$("#endtime").val(stopNap);
    		}
    	});
    });	
	
</script>
@stop