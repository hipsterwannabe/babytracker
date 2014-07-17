@extends('layouts.master')

@section('content')

	<div class="container">
		<h1>Bottle View</h1>

		<form action="POST">
			<label for="bottleStart"></label>
			<button name="bottleStart" id="bottleStart">Bottle Start</button><br>
		</form>

		<form action="POST">
			<label for="bottleStop"></label>
			<button name="bottleStop" id="bottleStop">Bottle Stop</button><br>
		</form>

		<hr>

		<form>

			<label for="ounces">Ounces</label><br>
			<input type="text" name="ounces" id="ounces" size="5" maxlength="5"><br>

			<label for="notes">Notes</label><br>
			<textarea name="notes" class="notes" type="text"></textarea><br>
			<button type="submit" class="submit">Submit</button>

		</form>
	</div>

@stop