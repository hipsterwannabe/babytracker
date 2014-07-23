@extends('layouts.master')

@section('content')

<div class="container">
    <!-- Event Sidebar -->

    <div class="col-lg-offset-1 col-lg-8">

        <div class="row">
            <div class="col-lg-4">
                <h3>Growth Stats</h3>
            </div>
        </div>

        <div class="well well-sm">

            {{ Form::open(array('action' => array('EventController@doStats', $baby->id))) }}

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1" >
                        {{ Form::label('pounds', 'Pounds:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('pounds', null, array('placeholder' => 'Lbs...')) }}<br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1" >
                        {{ Form::label('ounces', 'Ounces:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('ounces', null, array('placeholder' => 'Oz...')) }}<br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1" >
                        {{ Form::label('length', 'Length:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('length', null, array('placeholder' => '19.5')) }}<br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-lg-1" >
                        {{ Form::label('head', 'Head Cir:') }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::text('head', null, array('placeholder' => '13.5')) }}<br>
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
</div> <!-- container -->

@stop