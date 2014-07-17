@extends('layouts.master')

@section('content')
	
	<style>

		.babyImage {
			text-align: center;
		}

	</style>

	<div class="container">

		<h1>Main Menu</h1>

		<!-- TODO: add a view to add a child -->
		<button>Add Child</button><br>

		<div class="babyImage">
			<a href="baby-stats"><img class="img-circle" src="assets/img/baby-face.jpg"></a><br>
		</div>

	</div>
	
@stop