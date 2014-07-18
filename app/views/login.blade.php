@extends('layouts/master')

@section('content')

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <h1>BabyTracker</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <!-- Log In -->
                {{ Form::open(array('action' => 'HomeController@doLogin', 'class' => 'form-inline')) }}

                <div class="form-group">
                    {{ Form::label('email', 'Email', array('class' => 'sr-only')) }}
                    {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('password', 'Password', array('class' => 'sr-only')) }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Enter password')) }}
                </div>

                {{ Form::submit('Log In', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <a href="/new-user">Create new user</a>
            </div>
        </div>
    </div>

@stop
