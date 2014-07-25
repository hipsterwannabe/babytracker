@extends('layouts.master')

@section('content')

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h3>Bottle Feeding</h3>
            </div>
            <div class="widget-body">

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div id="bottleTimer"></div>
                    </div>
                </div>

                {{ Form::open(array('action' => array('EventController@doBottle', $baby->id), 'class' => 'form-horizontal')) }}

                <!-- Hidden inputs to assign time values -->
                {{ Form::hidden('start_bottle', null, array('id' => 'beginTime')) }}
                {{ Form::hidden('end_bottle', null, array('id' => 'endTime')) }}

                {{ Form::hidden('length', null, array('id' => 'feedingLength')) }}

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {{ Form::button('Start', array('class' => 'btn btn-success', 'id' => 'timer')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('ounces', 'Ounces', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::selectRange('ounces', 1, 10, null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('notes', 'Notes', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::textarea('notes', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'feeding notes...')) }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {{ Form::submit('Submit', array('class' => 'btn btn-warning')) }}
                    </div>
                </div>

                {{ Form::close() }}

           </div>

           <div class="widget-foot">

           </div>

        </div>

    </div>


    <!-- ---------------------------------------------------- -->


    <div class="widget">
       <div class="widget-head">
          <h5>Table #1</h5>
       </div>
       <div class="widget-body no-padd">
            <div class="table-responsive">
              <table class="table table-hover table-bordered ">
               <thead>
                 <tr>
                   <th>Time</th>
                   <th>Length</th>
                   <th>Ounces</th>
                   <th>Notes</th>
                 </tr>
               </thead>
               <tbody>
                @foreach (Auth::user()->babies as $baby)
                    @foreach ($baby->feedings as $feeding)
                        @if ($feeding->bottle == 1)
                            @if ($feeding->baby_id == $baby->id)
                            <tr>
                                <td>{{{ $feeding->created_at }}}</td>
                                <td>{{{ $feeding->bottle_length }}}</td>
                                <td>{{{ $feeding->bottle_ounces }}}</td>
                                <td>{{{ $feeding->notes }}}</td>
                            </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
               </tbody>
             </table>
         
         </div>
       </div>
       
       <div class="widget-foot">
        
          <ul class="pagination pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
          </ul>
           
           <div class="clearfix"></div>
       </div>
       
    </div>

</div>

@stop

@section('bottomscript')

<script type="text/javascript" src="/assets/FlipClock-master/compiled/flipclock.js"></script>

<script>
    // Initialize values
    var startBottle = null;
    var stopBottle = null;
    var flipClock = null;
    var bottleLength = null;
    $(document).ready(function() {
        // Flipclock Timer
        flipClock = $('#bottleTimer').FlipClock({
            autoStart: false
        });
        // Click event logs timestamp and changes button
        $(document).on('click', "#timer", function() {
            if (startBottle == null && stopBottle == null) {
                startBottle = moment();
                $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
                $(this).text("End Feeding");
                $("#beginTime").val(startBottle);
                // Start TImer
                flipClock.start();
            } else if (startBottle !== null && stopBottle == null) {
                // Logs time of stopBottle, disables button
                stopBottle = moment();
                $(this).text("Tummy's Full!");
                $(this).attr("disabled", "disabled");
                $("#endTime").val(stopBottle);
                // Stop Timer
                flipClock.stop();
                bottleLength = stopBottle.diff(startBottle);
                $("#feedingLength").val(bottleLength);
            }
        });
    });

</script>

<script src="http://code.highcharts.com/highcharts.js"></script>


@stop

