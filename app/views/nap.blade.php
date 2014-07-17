@extends('layouts.master')


@section('content')
	<div class="container">
		<h1>Nap Form Mockup</h1><br>
	<!-- laravel form helper here -->
	<!-- button to start nap timer -->
	<!-- button should change to STOP onclick -->
    
	    <div>
	    	
	    	<button type="button" class="btn btn-success" id="timer">START NAP</button>
	    
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

@section('bottom-script')
<script>
	var startNap = null;
	var stopNap = null;
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