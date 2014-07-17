@extends('layouts.master')

@section('content')

<div class="btn-group-vertical">
    @foreach ( Auth::user()->babies as $baby)
        <a href="/menu/{{$baby->id}}" class="btn btn-primary btn-lg" role="button">{{ $baby->name }}</a>
    @endforeach
</div>

@stop