@extends('layouts.master')

@section('content')

<div class="container">
    <div class="page-content page-form">

        <div class="widget">
            <div class="widget-head">
                <h3>Nap Time</h3>
            </div>
            <div class="widget-body">

                <div class="form-group">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div id="napTimer"></div>
                    </div>
                </div>

                {{ Form::open(array('action' => array('EventController@doNap', $baby->id), 'class' => 'form-horizontal')) }}

                <!-- Hidden inputs to assign time values -->
                {{ Form::hidden('start_nap', null, array('id' => 'beginTime')) }}
                {{ Form::hidden('end_nap', null, array('id' => 'endTime')) }}
                {{ Form::hidden('length', null, array('id' => 'napLength')) }}

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        {{ Form::button('Start', array('class' => 'btn btn-success', 'id' => 'timer')) }}
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('notes', 'Notes', array('class' => 'col-lg-2 control-label')) }}
                    <div class="col-lg-10">
                        {{ Form::textarea('notes', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'nap notes...')) }}
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
        <div class="widget">
            <div class="widget-head">
              <h3>Nap Log</h3>
           </div>
            <div class="widget-body no-padd">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered ">
                   <thead>
                     <tr>
                       <th>Date/Time</th>
                       <th>Length of Nap</th>
                       <th>Notes</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach (Auth::user()->babies as $baby)
                        @foreach ($baby->naps as $nap)
                         <tr>
                           <td>{{ $nap->start }}</td>
                           <td>{{ $nap->length }}</td>
                           <td>{{ $nap->notes }}</td>
                         </tr>
                         @endforeach
                    @endforeach
                   </tbody>
                 </table>

             </div>
        </div>

       <div class="widget-foot">
           <div class="clearfix"></div>
       </div>
    </div>

</div>

@stop

@section('bottomscript')

<script type="text/javascript" src="/assets/FlipClock-master/compiled/flipclock.js"></script>

<script>

    // Initialize values
    var startNap = null;
    var stopNap = null;
    var flipClock = null;
    $(document).ready(function() {
        //Shows timer on page load
        flipClock = $('#napTimer').FlipClock({
            autoStart: false
        });
        // Click event logs timestamp and changes button
        $(document).on('click', "#timer", function() {
            if (startNap == null && stopNap == null) {
                startNap = moment();
                $(this).removeClass("btn btn-primary").addClass("btn btn-danger");
                $(this).text("Stop Nap");
                console.log(startNap);
                $("#beginTime").val(startNap);
                flipClock.start();

            } else if (startNap !== null && stopNap == null) {
                // logs time of stopNap, disables button
                stopNap = moment();
                $(this).text("Wakey! Wakey!");
                $(this).attr("disabled", "disabled");
                console.log(stopNap);
                $("#endTime").val(stopNap);
                //stop the flipclock timer
                flipClock.stop();
                var napLength = stopNap.diff(startNap);
                console.log(napLength);
                $("#napLength").val(napLength);
            }
        });
    });

</script>

@stop