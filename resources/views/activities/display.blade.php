@extends('layouts.app')

@section('content')
</br>
    <div class="container">
        <div class="row">        
            <div class="col-md-12">
                <h1 class="text-center">Activity Panel</h1>
                <div class="row">
                   <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Activity Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b>Activity Title:</b> {{$activity->name}}</p>
                                        
                                        <p><b>Date:</b> {{$activity->date}}</p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p><b>Venue:</b> {{$activity->venue}}</p>
                                        <p><b>Duration:</b> {{$activity->start}} - {{$activity->end}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                   <div class="col-md-1"></div>
                    <div class="col-md-10">
                    <!-- DataTables Example -->
            <div class="card">     
                <div class="card-header">
                    <h4 class="card-title">Attendance</h4>
                </div>
                    <div class="card-body">
                        @php 
                            /*date_default_timezone_set('Asia/Singapore');
                            $date = date('Y-m-d');
                            $time = date('h:i:sa');
                            echo $time; 
                            echo date('h:i:sa', strtotime($activity->start));
                            if($time < $activity->start){
                                echo "hello";
                            }*/
                        @endphp
                        <?php 
                            date_default_timezone_set('Asia/Singapore');
                            $date = date('Y-m-d');
                            if($activity->date > $date){
                        ?>
                            <h4>Event has not started yet.</h4>
                        <?php
                            }else{
                        ?>
                        <p>
                            Number of members who attended: 
                            @if(count($logs) > 0)
                                {{ count($logs).' out of '.count($members) }}
                            @else
                                {{"No members have timed in yet"}}
                            @endif
                        </p>
                        @if(count($members) > 0)
                            @if($activity->status == "Upcoming")
                                <h3 class="text-center">The even hasn't started yet.</h3>
                            @else
                                <table class="table table-hover" id="myTable">
                                    <thead class="thead">
                                        <th>ID</th>
                                        <th>Member</th>
                                        <th>Department</th>
                                        <th>Member Type</th>
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                    </thead>
                                    <tbody>
                                        @foreach($members as $m)
                                            <tr>
                                                <td>{{$m->id}}</td>
                                                <td>{{$m->first_name}} {{$m->last_name}}</td>
                                                <td>{{$m->dept}}</td>
                                                <td>{{$m->user_type}}</td>
                                                <td>
                                                    @php
                                                        $flag = 0;
                                                        foreach($logs as $log){
                                                            if($log->member_id == $m->id){
                                                                $flag++;
                                                                $time_in = $log->time_in;
                                                            }
                                                        }
                                                        if($flag != 0){
                                                            echo $time_in;
                                                        }else{
                                                            date_default_timezone_set('Asia/Singapore');
                                                            $date = date('Y-m-d');
                                                            $time = date('h:i:sa');
                                                            $start_time = date('h:i:sa', strtotime($activity->start));
                                                            if($activity->date < $date){
                                                                echo "Not present";
                                                            }else{
                                                                if($start_time >= $time){
                                                                   echo "<a href='#' role='button' class='btn btn-outline-success btn-sm disabled'>Time In</a>";
                                                                   // echo "dako ang start time";
                                                                }else if($start_time < $time){
                                                                   echo "<a href='/time_in/$m->id/$activity->id' role='button' class='btn btn-outline-success btn-sm'>Time In</a>";
                                                                   // echo "dako ang current time";
                                                                }
                                                            }
                                                        }
                                                    @endphp
                                                </td>
                                                <td>
                                                    @php
                                                        $flag = 0;
                                                        foreach($logs as $log){
                                                            if($log->member_id == $m->id){
                                                                $flag++;
                                                                $log_id = $log->id;
                                                                $time_in = $log->time_in;
                                                                $time_out = $log->time_out;
                                                            }
                                                        }
                                                        if($flag != 0){
                                                            if($time_in != NULL && $time_out == "00:00:00"){
                                                                date_default_timezone_set('Asia/Singapore');
                                                                $date = date('Y-m-d');
                                                                $time = date('h:i:sa');
                                                                $end_time = date('h:i:sa', strtotime($activity->end));
                                                                if($activity->date > $date){
                                                                    echo "Member did not time out.";
                                                                }else{
                                                                    if($time < $end_time){
                                                                        echo "<a href='#' role='button' class='btn btn-outline-success btn-sm disabled'>Time Out</a>";
                                                                    }else{
                                                                        echo "<a href='/time_out/$log_id/$activity->id' role='button' class='btn btn-outline-success btn-sm'>Time Out</a>";
                                                                    }
                                                                }
                                                            }else if($time_in != NULL && $time_out != "00:00:00"){
                                                                echo $time_out;
                                                            }
                                                        }else{
                                                            if($activity->date < $date){
                                                                echo "Not present";
                                                            }else{
                                                                echo "Member hasn't timed in yet.";
                                                            }
                                                        }
                                                    @endphp
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endif
                        <?php } ?>        
                    </div>
                </div>
            </div>
            <script>
            $(document).ready( function () {
              $('#myTable').DataTable();
          } );   
            </script>
    
@endsection
