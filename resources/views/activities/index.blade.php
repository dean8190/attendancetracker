@extends('layouts.app')

@section('content')
    @guest
        <div class="col-md-12 text-center">
            <h3>ATTENDANCE TRACKER</h3>
        </div>
    @else
        <div class="container">
            <div class="text-center">
            <h1>ATTENDANCE TRACKER</h1>
                <a href="/newActivity" class="btn btn-outline-primary" role="button">New Activity</a>
                </br>
                </br>
            </div>
            <div class="row">        
                <div class="col-md-12">
                    @if(count($activities) > 0)    
                        <table class="table table-hover">
                            <thead class="thead">
                                <th>Activity Name</th>
                                <th>Rodriguez</th>
                                <th>Asilo</th>
                                <th>Abella</th>
                                <th>Date</th>
                                <th>Venue</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($activities as $a)
                                    <tr>    
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->rodriguez}}</td>
                                        <td>{{$a->asilo}}</td>
                                        <td>{{$a->abella}}</td>
                                        <td>{{$a->date}}</td>
                                        <td>{{$a->venue}}</td>
                                        <td>
                                            <?php 
                                                date_default_timezone_set('Asia/Singapore');
                                                $date = date('Y-m-d');
                                                if($a->date > $date || $a->date == $date){
                                            ?> 
                                            <a href="/EditAct/{{$a->id}}" role="button" class="btn btn-outline-primary btn-sm">Edit</a> 
                                            <?php
                                                }
                                            ?>
                                            <a href="/viewActivity/{{$a->id}}" role="button" class="btn btn-outline-success btn-sm">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    @endguest
@endsection