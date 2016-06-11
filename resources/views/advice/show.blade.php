@extends('layouts.main')
@section('title','Advice details')
@section('content')

    {{$advice->advice}}
@if($advice->user_id==auth()->user()->id)
    <a href="/{{$advice->id}}/edit" class="btn btn-default">Edit</a>

   {!! Form::open(array('route' => ['advices.destroy',$advice->id],'method'=>'DELETE'))!!}
    {!! Form::submit('Delete',$attributes=['class'=>'btn btn-danger']) !!}
    {!! Form::close() !!}
@endif
@stop
