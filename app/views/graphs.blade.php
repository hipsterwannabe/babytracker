@extends('layouts.master')

@section('content')

	<h1>Here is {{ $baby->name }} stats</h1>

	<!-- nap graph -->
	<div id="napContainer" style="width:90%; height:300px;"></div>
	<!-- spacer -->
	<div id="container" style="width:90%; height:10px;"></div>
	<!-- diaper graph -->
	<div id="diaperContainer" style="width:90%; height:300px;"></div>
	<!-- spacer -->
	<div id="container" style="width:90%; height:10px;"></div>
	<!-- feeding graph -->
	<div id="feedingContainer" style="width:90%; height:300px;"></div>
@stop

@section('bottomscript')
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript">
	$(function () {
		//nap chart
	    $('#napContainer').highcharts({
	        title: {
	        	text: 'Nap Chart'
	        },
	        xAxis: {
	        	type: 'datetime',
	        	dateTimeLabelFormats: {
                	day: '%e. %b'
            	}
	        },
	        yAxis: {
	        	floor: 0,
	        	type: 'datetime', //y-axis will be in milliseconds
	        	dateTimeLabelFormats: {
	        		second: '%H:%M:%S',
	        	},
	        	pointInterval: 3600 * 1000
	        },
		    series: [{
		        data: {{ json_encode($napData, JSON_NUMERIC_CHECK) }}
			}]

		});

		//diaper chart
		var diaperLabels = [" ", "Wet", "Dirty", "Both"];

	    $('#diaperContainer').highcharts({
	        title: { text: 'Diaper Chart' },
	        chart: { type: 'line' },
	        xAxis: {
	        	type: 'datetime',
	            title: { text: 'Time of Diaper Change' }
	        },
	        yAxis: {
	            title: { text: 'Type of Change' },
	            labels: {
		            formatter: function() {
		                return diaperLabels[this.value];
		            },
		        },
	            tickInterval: 1,
	            floor: 1,
	            ceiling: 3
	        },
	        tooltip: {
			    backgroundColor: '#FCFFC5',
			    borderColor: 'black',
			    borderRadius: 10,
			    borderWidth: 3,
			    shared: true,
			},
			series: [{
				data: {{ json_encode($diaperData, JSON_NUMERIC_CHECK) }}
			}]
	    });

		//feeding chart
	    $('#feedingContainer').highcharts({
	        title: { text: 'Feeding Chart' },
	        chart: { type: 'line', },
	        xAxis: {
	        	type: 'datetime',
	            title: { text: 'Time of Feeding' }
	        },
	        yAxis: [{ //--- Primary yAxis
			    title: { text: 'Length of Nursing Time' }
			}, { //--- Secondary yAxis
			    title: { text: 'Length of Bottle Time' },
			    opposite: true
			}],
	        tooltip: {
			    backgroundColor: '#FCFFC5',
			    borderColor: 'black',
			    borderRadius: 10,
			    borderWidth: 3,
			    shared: true,
			},
			series: [{
				data: {{ json_encode($feedingData, JSON_NUMERIC_CHECK) }}
			}]
	    });
	});
	</script>
@stop