@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Edit Activity</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!! Form::open(['action' => 'ActivityController@update', 'method' => 'POST']) !!}
                <div class="form-group">
                    @foreach($activity as $a)
                    {{Form::hidden('id', 'Activity ID')}}
                    {{Form::hidden('id', $a->id,['class' => 'form-control', 'readonly' =>  'true'])}}
                {{Form::label('name', 'Activity Title')}}
                {{Form::text('name', $a->name , ['class' => 'form-control', 'placeholder' => "Activity Title"])}}
                {{Form::label('date', 'Date')}}
                {{Form::date('date', $a->date, ['class' => 'form-control']) }}
                {{Form::label('start', 'Time Start')}}
                {{Form::time('start', date('H:i', strtotime($a->start)), ['class' => 'form-control']) }}
                {{Form::label('end', 'Time End')}}
                {{Form::time('end', $a->end, ['class' => 'form-control']) }}
                {{Form::label('venue', 'Venue')}}
                {{Form::text('venue', $a->venue, ['class' => 'form-control', 'placeholder' => "Venue"])}}
                @endforeach
                {{csrf_field()}}
                <br>
                {{Form::submit('Submit', ['class'=>'btn btn-outline-primary'])}}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection