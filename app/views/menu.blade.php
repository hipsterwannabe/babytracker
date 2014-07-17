@extends('layouts.master')

@section('content')

	<style>

		.babyImage {
			text-align: center;
		}

	</style>

	<div class="container">

		<h1>Main Menu</h1>
		
		<!-- Select child to log data to -->
		<form>
				<a class="btn btn-lg btn-info pull-right" href="add-child">Add Child</a>
		</form>

		<hr class="featurette-divider">

		<!-- Baby picture and info -->
	  	<div class="featurette">
	  		<div class="babyImage featurette-image img-circle pull-left">
				<a href="baby-stats"><img class="img-circle" src="assets/img/baby-face.jpg"></a><br>
				<p class="text-muted">click to edit info</p>
			</div>
			<!-- use logic to display info based on baby id instead of hard-code info -->
	    	<h2 class="featurette-heading">Baby Name. <span class="text-muted">other info.</span></h2>
	    	<p class="lead">anything else you want to put here.</p>
	  	</div>
	</div>

@stop




