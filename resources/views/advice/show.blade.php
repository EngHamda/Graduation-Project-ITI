@extends('layouts.main')

@section('content')

    {{$advice->advice}}

    <a href="{{$advice->id}}/edit" class="btn btn-default">Edit</a>

   {!! Form::open(array('route' => ['advices.destroy',$advice->id],'method'=>'DELETE'))!!}
    {!! Form::submit('Delete',$attributes=['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}

@stop
