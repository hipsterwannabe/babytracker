@extends('layouts.master')

@section('content')

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h3>Add Baby</h3>
            </div>
            <div class="widget-body">
                {{ Form::open(array('class' => 'form-horizontal', 'action' => array('UserController@newBaby'), 'files' => true)) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Baby name...')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('image', 'Image', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::file('image') }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('gender', 'Gender', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::select('gender', array('Boy' => 'Boy', 'Girl' => 'Girl'), null, array('class' => 'form-control')) }}
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('birth_date', 'Birthday', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::text('birth_date', null, array('class' => 'form-control', 'placeholder' => 'YYYY-MM-DD')) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {{ Form::submit('Submit', array('class' => 'btn btn-warning')) }}
                    </div>
                </div>

                {{ Form::close() }}

           </div>

           <div class="widget-foot">

           </div>

        </div>

    </div>

</div>

@stop