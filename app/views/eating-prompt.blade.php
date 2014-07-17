@extends('layouts.master')

@section('content')

<div class="container">
    <h1>How is your baby fed?</h1>

    <!-- depending on input, user will be taken to appropriate view -->
    <form>
        <a class="btn btn-block btn-info" href="breast">Breast</a>
        <a class="btn btn-block btn-warning" href="bottle">Bottle</a>
    </form>
</div>

@stop