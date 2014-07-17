@extends('layouts.master')

@section('content')

	<div class="container">
		<h1>How is your baby fed?</h1>

		<!-- depending on input, user will be taken to appropriate view -->
		<form>
			<label for="bottle">Bottle</label><br>
			<input type="radio" name="feeding" value="Bottle"><br>
			<label for="breast">Breast</label><br>
			<input type="radio" name="feeding" value="Breast"><br>
			<button type="submit" class="submit">Submit</button>
		</form>
	</div>
	
@stop