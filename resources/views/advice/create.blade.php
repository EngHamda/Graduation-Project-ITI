@extends('layouts.main')

@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Create Advice</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(array('action' => 'AdvicesController@store','enctype'=>'multipart/form-data')) !!}

            <div class="form-group">
                {!!Form::label('advice', 'Insert Advice') !!}
                {!! Form::text('advice',$values=null,$attributes=['class'=>'form-control','name'=>'advice'])!!}

                {!! Form::label('physician_id','By Whom') !!}
                {!! Form::text('user_id',$values=null,$attributes=['class'=>'form-control','name'=>'user_id']) !!}
                {!! Form::submit('Submit')!!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@stop





