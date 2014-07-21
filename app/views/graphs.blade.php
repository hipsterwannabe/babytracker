@extends('layouts.master')

@section('topscript')

<script src="http://code.highcharts.com/highcharts.js"></script>

@stop
@section('content')

<h1>Here is {{ $baby->name }} stats</h1>


<!-- nap graph -->
<div id="container" style="width:100%; height:400px;"></div>



<!-- diaper graph -->




<!-- feeding graph -->
@stop

@section('bottomscript')
<script type="text/javascript">
	$(function () { 
	    $('#container').highcharts({
	        chart: {
	            type: 'bar'
	        },
	        title: {
	            text: 'Fruit Consumption'
	        },
	        xAxis: {
	            categories: ['Apples', 'Bananas', 'Oranges']
	        },
	        yAxis: {
	            title: {
	                text: 'Fruit eaten'
	            }
	        },
	        series: [{
	            name: 'Jane',
	            data: [1, 0, 4]
	        }, {
	            name: 'John',
	            data: [5, 7, 3]
	        }]
	    });
</script>
});