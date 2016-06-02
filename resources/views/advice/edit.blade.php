@extends('layouts.main')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Advice</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => ['/advices/update/'.$advice->id],'method'=>'PUT','enctype'=>'multipart/form-data')) !!}

            <div class="form-group">
                {!!Form::label('advice', 'Update Advice') !!}
                {!! Form::text('advice', $value=$advice->advice ,$attributes=['class'=>'form-control','name'=>'advice'])!!}
                {!! Form::submit('Update')!!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@stop