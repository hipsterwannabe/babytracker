@extends('layouts.master')

@section('content')

	<h1>Here is {{ $baby->name }} stats</h1>

	<!-- nap graph -->
	<div id="napContainer" style="width:90%; height:200px;"></div>
	<!-- spacer -->
	<div id="container" style="width:90%; height:10px;"></div>
	<!-- diaper graph -->
	<div id="diaperContainer" style="width:90%; height:200px;"></div>
	<!-- spacer -->
	<div id="container" style="width:90%; height:10px;"></div>
	<!-- feeding graph -->
	<div id="feedingContainer" style="width:90%; height:200px;"></div>
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
	        chart: {
	            type: 'line'
	        },
	        xAxis: {
	            title: {
	                text: 'Time of Nap'
	            }
	        },
	        yAxis: {
	            title: {
	                text: 'Nap Length'
	            }
	        },
	        tooltip: {
			    backgroundColor: '#FCFFC5',
			    borderColor: 'black',
			    borderRadius: 10,
			    borderWidth: 3,
			    shared: true,
			},
			series: [{
	        	data: [{{ $napData }}]
			}]
	    });

	});

	//diaper chart
	$(function () { 
	    $('#diaperContainer').highcharts({
	        title: {
	        	text: 'Diaper Chart'
	        },
	        chart: {
	            type: 'line'
	        },
	        xAxis: {
	            title: {
	                text: 'Time of Diaper Change'
	            }
	        },
	        yAxis: {
	            title: {
	                text: 'Type of Change'
	            }
	        },
	        tooltip: {
			    backgroundColor: '#FCFFC5',
			    borderColor: 'black',
			    borderRadius: 10,
			    borderWidth: 3,
			    shared: true,
			},
			series: [{
				data: [{{ $diaperData}}]
			}]
	    });
	});

	// //feeding chart
	// $(function () { 
	//     $('#feedingContainer').highcharts({
	//         title: {
	//         	text: 'Feeding Chart'
	//         },
	//         chart: {
	//             type: 'bar'
	//         },
	//         xAxis: {
	//             categories: ['Apples', 'Bananas', 'Oranges']
	//         },
	//         yAxis: {
	//             title: {
	//                 text: 'Fruit eaten'
	//             }
	//         },
	//         tooltip: {
	// 		    backgroundColor: '#FCFFC5',
	// 		    borderColor: 'black',
	// 		    borderRadius: 10,
	// 		    borderWidth: 3,
	// 		    shared: true,
	// 		},
	//     });
	// });

		// $(document).ready(function () { 
		//     $('#diaperContainer').highcharts({
		//         chart: {
		//             type: 'bar'
		//         },
		//         title: {
		//             text: 'Fruit Consumption'
		//         },
		//         xAxis: {
		//             categories: ['Apples', 'Bananas', 'Oranges']
		//         },
		//         yAxis: {
		//             title: {
		//                 text: 'Fruit eaten'
		//             }
		//         },
		//         series: [{
		//             name: 'Jane',
		//             data: [1, 0, 4]
		//         }, {
		//             name: 'John',
		//             data: [5, 7, 3]
		//         }]
		//     });

		// });
	</script>
@stop