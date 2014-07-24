@extends('layouts.dummy')

@section('content')

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
           <div class="widget-head">
              <h5>DIaper Change</h5>
           </div>
           <div class="widget-body">
                {{ Form::open(array('action' => array('EventController@doDiaper', $baby->id), 'class' => 'form-horizontal')) }}

                <div class="form-group">
                        {{ Form::label('type', 'Diaper', array('class' => 'col-lg-2 control-label')) }}
                  <div class="col-lg-10">
                        {{ Form::select('type', array('0' => '-----', 'number_one' => 'Wet', 'number_two' => 'Dirty', 'both' => 'Both'), null, array('class' => 'form-control')) }}
                  </div>
                </div>

                <div class="form-group">
                        {{ Form::label('consistency', 'Texture', array('class' => 'col-lg-2 control-label')) }}
                  <div class="col-lg-10">
                        {{ Form::select('consistency', array('0' => '-----', '1' => 'Loose', '2' => 'Seedy', '3' => 'Thick', '4' => 'Sticky', '5' => 'Chunky', '6' => 'Hard' ), null, array('class' => 'form-control')) }}
                  </div>
                </div>

                <div class="form-group">
                        {{ Form::label('color', 'Color', array('class' => 'col-lg-2 control-label')) }}
                  <div class="col-lg-10">
                        {{ Form::select('color', array('0' => '-----',  '1' => 'White', '2' => 'Beige', '3' => 'Light Green', '4' => 'Dark Green', '5' => 'Light Brown', '6' => 'Dark Brown' ), null, array('class' => 'form-control')) }}
                  </div>
                </div>


                <div class="form-group">
                        {{ Form::label('leak', 'Leaked?', array('class' => 'col-lg-2 control-label')) }}
                  <div class="col-lg-10">
                    <label class="checkbox-inline">
                        {{ Form::checkbox('leak', 'Yes') }} Yes
                    </label>
                  </div>
                </div>

                <div class="form-group">
                        {{ Form::label('notes', 'Notes', array('class' => 'col-lg-2 control-label')) }}
                  <div class="col-lg-10">
                        {{ Form::textarea('notes', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'diaper notes...')) }}
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
                  </div>
                </div>
                {{ Form::close() }}


              </form>
           </div>

           <div class="widget-foot">

           </div>
        </div>

    </div>
</div>

@stop