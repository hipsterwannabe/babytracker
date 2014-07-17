@extends('layouts.master')

@section('content')

	<div class="container">
		<h1>Breast View</h1>

		<!-- try to refactor to have one button for each side
				which will change from start to stop on click -->

		<form action="POST">
			<label for="breastLeftStart">Breast Left Start</label><br>
			<button name="breastLeftStart" id="breastLeftStart">Start</button><br>
		</form>

		<form action="POST">
			<label for="breastLeftStop">Breast Left Stop</label><br>
			<button name="breastLeftStop" id="breastLeftStop">Stop</button><br>
		</form>

		<form action="POST">
			<label for="breastRightStart">Breast Right Start</label><br>
			<button name="breastRightStart" id="breastRightStart">Start</button><br>
		</form>

		<form action="POST">
			<label for="breastRightStop">Breast Right Stop</label><br>
			<button name="breastRightStop" id="breastRightStop">Stop</button><br>
		</form>

		<form>
			<label for="notes">Notes</label><br>
			<textarea name="notes" class="notes" type="text"></textarea><br>
			<button type="submit" class="submit">Submit</button>
		</form>
	</div>

@stop