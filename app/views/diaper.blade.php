@extends('layouts.master')

@section('content')

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h3>Diaper Change</h3>
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
                        {{ Form::select('consistency', array('0' => '-----', 'Loose' => 'Loose', 'Seedy' => 'Seedy', 'Thick' => 'Thick', 'Sticky' => 'Sticky', 'Chunky' => 'Chunky', 'Hard' => 'Hard' ), null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('color', 'Color', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::select('color', array('0' => '-----',  'White' => 'White', 'Beige' => 'Beige', 'Light Green' => 'Light Green', 'Dark Green' => 'Dark Green', 'Light Brown' => 'Light Brown', 'Dark Brown' => 'Dark Brown' ), null, array('class' => 'form-control')) }}
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
                        {{ Form::submit('Submit', array('class' => 'btn btn-warning')) }}
                    </div>
                </div>

                {{ Form::close() }}

            </div>

            <div class="widget-foot"></div>

        </div>

    </div> <!-- Page-content page-form -->

    <div class="widget">

        <div class="widget-head">
            <h3>Diaper Log</h3>
        </div>

        <div class="widget-body no-padd">

            <div class="table-responsive">

                <table class="table table-hover table-bordered ">
                    <thead>
                        <tr>
                            <th>Date/Time</th>
                            <th>Diaper</th>
                            <th>Consistency</th>
                            <th>Color</th>
                            <th>Leak</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (Auth::user()->babies as $baby)
                        @Foreach ($baby->diapers as $diaper)
                            @if ($diaper->baby_id == $baby->id)
                                <tr>
                                    <td>{{{ $diaper->created_at }}}</td>
                                    @if ($diaper->number_one == 1 && $diaper->number_two == 1)
                                        <td>Both</td>
                                    @elseif ($diaper->number_two == 1 && $diaper->number_one == null)
                                        <td>Dirty</td>
                                    @else ($diaper->number_one == 1 && $diaper->number_two == null)
                                        <td>Wet</td>
                                    @endif
                                    @if (isset($diaper->consistency))
                                        <td>{{{ $diaper->consistency }}}</td>
                                    @else
                                        <td>N/A</td>
                                    @endif
                                    @if (isset($diaper->color))
                                        <td>{{{ $diaper->color }}}</td>
                                    @else
                                        <td>N/A</td>
                                    @endif
                                    @if (isset($diaper->leak))
                                        <td>Yes</td>
                                    @else
                                        <td>No</td>
                                    @endif
                                    <td>{{{ $diaper->notes }}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        <div class="widget-foot"></div>

    </div>

</div> <!-- Container -->

@stop