@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            {!! Form::open(['action' => 'ActivityController@store', 'method' => 'POST']) !!}
                <div class="form-group">
                {{Form::label('name', 'Activity Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => "Activity Name"])}}
                {{Form::label('name', 'LAST NAME')}}
                {{Form::text('rodriguez', '', ['class' => 'form-control', 'placeholder' => "Last name"])}}

                {{Form::label('name', 'LAST NAME 2')}}
                {{Form::text('asilo', '', ['class' => 'form-control', 'placeholder' => "Last name"])}}

                {{Form::label('name', 'LAST NAME 3')}}
                {{Form::text('abella', '', ['class' => 'form-control', 'placeholder' => "Last name"])}}
                {{Form::label('date', 'Start Date')}}
                {{Form::date('date', date('d-M-y'),['class' => 'form-control']) }}
                {{Form::label('start', 'Start')}}
                {{Form::time('start', 'h:i',['class' => 'form-control']) }}
                {{Form::label('end', 'End')}}
                {{Form::time('end', 'h:i',['class' => 'form-control']) }}
                {{Form::label('venue', 'Venue')}}
                {{Form::text('venue', '', ['class' => 'form-control', 'placeholder' => "Venue"])}}
                <br>
                <br>
                {{csrf_field()}}

                {{Form::submit('Submit', ['class'=>'btn btn-outline-primary'])}}

                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection