@extends('layouts.main')

@section('content')

    @foreach($advices as $advice)

        {{$advice->advice}}

    @endforeach

@stop