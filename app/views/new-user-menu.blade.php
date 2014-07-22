@extends('layouts.master')

@section('content')

<style>

	#btnOptions {
		top: 200px;
	}
	h1 {
		text-align: center;
	}

</style>

<div class="container">

    <div class="col-lg-offset-4 col-lg-4">
        <h1>Welcome!</h1>
        <div class="btn-group-vertical btn-block" id="btnOptions">
            <a href="{{{ action('UserController@showCreateBaby') }}}" class="btn btn-info btn-lg" role="button">Add Baby</a>
        </div>
    </div>

</div>

@stop
