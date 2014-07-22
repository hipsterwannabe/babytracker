@extends('layouts.master')

@section('content')

    <!-- Event Sidebar -->

    <div class="col-lg-offset-1 col-lg-8">

        <div class="row">
            <div class="col-lg-4">
                <h3>Child Details</h3>
            </div>
        </div>

        <div class="well well-sm">

            {{ Form::open(array('action' => array('UserController@newBaby'), 'files' => true)) }}

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1">
                        {{ Form::label('name', 'Name: ') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('name', null, array('placeholder' => 'Baby name...')) }}<br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1">
                        {{ Form::label('image', 'Image: ') }} 
                    </div>
                    <div class="col-lg-6">
                        {{ Form::file('image') }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1" >
                        {{ Form::label('gender', 'Gender:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::select('gender', array('Boy' => 'Boy', 'Girl' => 'Girl')) }}<br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1">
                        {{ Form::label('birth_date', 'Birthday: ') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('birth_date', null, array('placeholder' => 'YYYY-MM-DD')) }}<br>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-1">
                        {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
                    </div>
                </div>
            </div>

            {{ Form::close() }}

        </div> <!-- well -->
    </div> <!-- column -->

@stop