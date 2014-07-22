@extends('layouts.master')

@section('content')

<!-- Add labels to the form!! -->

<div class="container">

    <div class="row">
        <div class="col-lg-offset-5 col-lg-3">
            <h2>{{{ $baby->name }}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-offset-5 col-lg-3">
            <h3>Diaper Change</h3>
        </div>
    </div>

    <div class="well well-sm">

        {{ Form::open(array('action' => array('EventController@doDiaper', $baby->id))) }}
        <div class="row">
            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-1">
                    {{ Form::label('type', 'Diaper:') }}
                </div>
                <div class="col-lg-6">
                    {{ Form::select('type', array('0' => '-----', 'number_one' => 'Wet', 'number_two' => 'Dirty', 'both' => 'Both')) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-1">
                    {{ Form::label('consistency', 'Consistency:') }}
                </div>
                <div class="col-lg-6">
                    {{ Form::select('consistency', array('0' => '-----', '1' => 'Loose', '2' => 'Seedy', '3' => 'Thick', '4' => 'Sticky', '5' => 'Chunky', '6' => 'Hard' )) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-1" >
                    {{ Form::label('color', 'Color:') }}
                </div>
                <div class="col-lg-6">
                    {{ Form::select('color', array('0' => '-----',  '1' => 'White', '2' => 'Beige', '3' => 'Light Green', '4' => 'Dark Green', '5' => 'Light Brown', '6' => 'Dark Brown' )) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-1">
                    {{ Form::label('leak', 'Leaked?') }}
                </div>
                <div class="col-lg-6">
                    {{ Form::checkbox('leak', 'Yes') }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-offset-4 col-lg-1">
                    {{ Form::label('notes', 'Notes:') }}
                </div>
                <div class="col-lg-6">
                    {{ Form::textarea('notes', null, array('class' => 'form-control', 'rows' => '3', 'cols' => '6', 'placeholder' => 'diaper notes...')) }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-offset-5 col-lg-1">
                    {{ Form::submit('SUBMIT', array('class' => 'btn btn-info')) }}
                </div>
            </div>
        </div>

        {{ Form::close() }}

    </div> <!-- well -->

</div> <!-- container -->

@stop