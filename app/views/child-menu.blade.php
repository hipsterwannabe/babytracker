@extends('layouts.master')

@section('content')

<div class="container">

    <div class="page-content">

        @foreach ( Auth::user()->babies as $baby)

            <div class="page-content page-profile">

                <div class="page-tabs">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile{{{$baby->id}}}" data-toggle="tab">Profile</a></li>
                        <li><a href="#update{{{$baby->id}}}" data-toggle="tab">Update Profile</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <!-- Profile tab -->
                        <div class="tab-pane fade active in" id="profile{{{$baby->id}}}">
                            <h4>{{{ $baby->name }}}'s Profile</h4>

                            <div class="row">
                                <div class="col-md-3 col-sm-3 text-center">
                                    <div class="row">
                                        <!-- Profile pic -->
                                        <a href="/graphs/{{$baby->id}}"><img src="{{{ $baby->img_path }}}" class="img-thumbnail img-circle img-responsive" /></a>
                                    </div>
                                    <div class="row">
                                        <a href="/graphs/{{$baby->id}}" class="btn btn-info">Select</a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <!-- Profile details -->
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="active"><strong>Name</strong></td>
                                            <td>{{{ $baby->name }}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Birth Date</strong></td>
                                            <td>{{{ $baby->birth_date }}}</td>
                                        </tr>
                                        <tr>
                                            <td class="active"><strong>Gender</strong></td>
                                            <td>{{{ $baby->gender }}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <!-- Update profile tab -->
                        <div class="tab-pane fade" id="update{{{$baby->id}}}">
                            <h4>Update Profile</h4>

                            {{ Form::model($baby, array('action' => array('UserController@updateBaby', $baby->id), 'class' => 'form-horizontal', 'files' => true)) }}
                            <!-- Name -->
                            <div class="form-group">
                                {{ Form::label('name', 'Name', array('class' => 'control-label col-lg-2')) }}
                                <div class="col-lg-6">
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>
                            </div>
                            <!-- Photo -->
                            <div class="form-group">
                                {{ Form::label('image', 'Image', array('class' => 'control-label col-lg-2')) }}
                                <div class="col-lg-6">
                                    {{ Form::file('image') }}
                                </div>
                            </div>
                            <!-- Gender -->
                            <div class="form-group">
                                {{ Form::label('gender', 'Gender', array('class' => 'control-label col-lg-2')) }}
                                <div class="col-lg-6">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">--- Please Select ---</option>
                                        <option value="Boy">Boy</option>
                                        <option value="Girl">Girl</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Birth Date -->
                            <div class="form-group">
                                {{ Form::label('birth_date', 'Birth Date', array('class' => 'control-label col-lg-2')) }}
                                <div class="col-lg-6">
                                    {{ Form::text('birth_date', null, array('placeholder' => 'YYYY-MM-DD', 'class' => 'form-control')) }}
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="form-group">
                                <!-- Buttons -->
                                <div class="col-lg-6 col-lg-offset-2">
                                    {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>

                    </div> <!-- Tab Content -->

                </div> <!-- Page Tabs -->

            </div> <!-- Page Content Page Profile -->

        @endforeach

    </div> <!-- Page Content -->

</div> <!-- Container -->

@stop