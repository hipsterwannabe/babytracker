@extends('layouts.master')

@section('content')

<div class="container">
    <h1>Add Child</h1>
    <hr>
</div>

<form action="POST">
    <input class="form-control" type="text" placeholder="Name"><br>

    <!-- change this input to be 3 dropdowns for YYYY/MM/DD -->
    <input class="form-control" type="text" placeholder="Date of birth"><br>

    <label>Gender: </label>
    {{ Form::radio('gender', 'M') }}
    {{ Form::label('gender', 'M') }}

    {{ Form::radio('gender', 'F') }}
    {{ Form::label('gender', 'F') }}
    <br>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop