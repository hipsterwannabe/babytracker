@extends('layouts.master')

@section('content')

	
<div class="out-container">
	<div class="container">
		<h1>Charts for {{ $baby->name }}, babe</h1>
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
	</div>
</div>
@stop

@section('bottomscript')
<script src="http://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    $(function () {
        //try to convert seconds to hh:mm:ss
        var convertTime = function(seconds) {

        };
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
                title: {text: 'Length of Nap (in hours)'},
                pointInterval: 3600,
                //tickInterval: 1800,
                floor: 0,
                ceiling: 43200,
                type: 'datetime',
                dateTimeLabelFormats: {
                    millisecond: '%H:%M',
                    second: '%H:%M',
                    minute: '%H:%M',
                    hour: '%H:%M',

                },
                showFirstLabel: false,
                labels:{
                    formatter: function(){
                        var minutes = "";
                        var hours = "";
                        var remainder = "";
                        if (this.value >= 3600){
                            hours = Highcharts.numberFormat((this.value / 3600), 1);
                            // remainder = Highcharts.numberFormat((this.value % 3600), 0);
                            // minutes = Highcharts.numberFormat((remainder / 60), 0),
                            return hours;
                        }
                        if (this.value > 59){
                            minutes = Highcharts.numberFormat((this.value/60), 0);
                            return minutes;
                        }
                    }
                }
            },
            tooltip: {
            	formatter: function() {
            		var seconds = this.y;
            		var hours = Math.floor(seconds / 3600);
            		var remainder = seconds % 3600;
            		var minutes = Math.floor(remainder / 60);
            		if (minutes < 10) {
            			minutes = '0' + minutes;
            		}
            		return hours + ":" + minutes;
            	}
            },
            series: [{
            	name: 'Nap',
                data: {{ json_encode($napData, JSON_NUMERIC_CHECK) }}
            }]
        });

        //diaper chart
        var diaperLabels = [" ", "Wet", "Both", "Dirty"];

	    $('#diaperContainer').highcharts({
	        title: { text: 'Diaper Chart' },
	        chart: { type: 'scatter' },
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
		        showFirstLabel: true,
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
				name: 'Diaper Change',
				data: {{ json_encode($diaperData, JSON_NUMERIC_CHECK) }}
			}]
	    });

		//feeding chart
	    $('#feedingContainer').highcharts({
	        title: { text: 'Feeding Chart' },
	        chart: { type: 'line', },
	        xAxis: {
	        	type: 'datetime',
	            title: { text: 'Time of Feeding' },
	            dateTimeLabelFormats: {day: '%e. %b'}
	        },
	        yAxis: [{
	        	//--- Primary yAxis
			    title: { text: 'Length of Feeding Time' }, 
			     //--- Secondary yAxis
			    // title: { text: 'Length of Bottle Time (in hours)' },
			    // opposite: true,
				floor: 0,
	        	ceiling: 14400,
	        	//pointInterval: 3600,
	        	showFirstLabel: false,
				//type: 'datetime',
	        	dateTimeLabelFormats: {
	        		millisecond: '%H:%M',
	        		second: '%H:%M',
		            minute: '%H:%M',
		            hour: '%H:%M'
	        	}
			}],
	        tooltip: {
			    backgroundColor: '#FCFFC5',
			    borderColor: 'black',
			    borderRadius: 10,
			    borderWidth: 3,
			    shared: true,
			    formatter: function() {
            		var seconds = this.y;
            		var hours = Math.floor(seconds / 3600);
            		var remainder = seconds % 3600;
            		var minutes = Math.floor(remainder / 60);
            		if (minutes < 10) {
            			minutes = '0' + minutes;
            		}
            		return hours + ":" + minutes;
            	}
			},
			labels:{
		    //        formatter: function(){
		    //             var minutes = "";
		    //             var hours = "";
		    //             var remainder = "";
		    //             if (this.value >= 3600){
		    //             	hours = Highcharts.numberFormat((this.value / 3600), 1); 
		    //             	// remainder = Highcharts.numberFormat((this.value % 3600), 0);
		    //             	// minutes = Highcharts.numberFormat((remainder / 60), 0),
		    //             	return hours;
						// } 
		    //             if (this.value > 59){
		    //                 minutes = Highcharts.numberFormat((this.value/60), 0);
		    //                 return minutes;
		    //             }
		    //         }
		       },
			series: [{
				name: 'Bottle',
				data: {{ json_encode($bottleData, JSON_NUMERIC_CHECK) }}
			}
			,{
				name: 'Nursing',
				data: {{ json_encode($nursingData, JSON_NUMERIC_CHECK) }}
			
			}]
	    });
	});
	</script>

@stop