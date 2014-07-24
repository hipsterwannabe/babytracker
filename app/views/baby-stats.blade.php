@extends('layouts.dummy')

@section('content')

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h3>Growth Stats</h3>
            </div>
            <div class="widget-body">
                {{ Form::open(array('action' => array('EventController@doStats', $baby->id), 'class' => 'form-horizontal')) }}

                <div class="form-group">
                    {{ Form::label('pounds', 'Pounds', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::text('pounds', null, array('class' => 'form-control', 'placeholder' => 'Lbs...')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('ounces', 'Ounces', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::text('ounces', null, array('class' => 'form-control', 'placeholder' => 'Oz...')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('length', 'Length', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::text('length', null, array('class' => 'form-control', 'placeholder' => '19.5')) }}
                    </div>
                </div>


                <div class="form-group">
                    {{ Form::label('head', 'Head Cir', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::text('head', null, array('class' => 'form-control', 'placeholder' => '13.5')) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
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