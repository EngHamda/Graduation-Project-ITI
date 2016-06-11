@extends('layouts.main')
@section('title','Q&A-Show Question')
{{--@section('sidebar')--}}
    {{--show Sidebar--}}
{{--@stop--}}
@section('content')
    <h1>{{ $question->question_specific }}</h1>
    <hr>
    <p style="padding-left: 15px;margin-left: 10px;">
        {{ $question->question_detail }}
    </p>
    <div class="row">
        @if(auth()->user())
            @if(auth()->user()->role_id==4)
                <a href="/answers/{{ $question->id}}/create" class="btn btn-success">Add Answer</a>
            @endif
        @endif
        @if(auth()->user())
            @if($question->patient_id == auth()->user()->id)
                <a href="/questions/{{ $question->id}}/edit" class="btn btn-info">Edit</a>

                {!! Form::open([ 'url' => "/questions/destroy/".$question->id,'method' => 'DELETE'] ) !!}
                {!! Form::submit('Remove', array('class'=>'btn btn-danger')) !!} 
                {!! Form::close() !!}
            @endif
        @endif
    </div>
    <hr>
    <h2>Answers</h2>
    <hr style="margin-bottom: 0px;margin-top: 0px;margin-left: 10px;">
    <ul>
        @foreach($question->answers as $answer)
        <li>
            <h5 style="padding-left: 15px;margin-bottom: 0px;padding-bottom: 0px;">
                {{ $answer->answer_specific }}
            </h5>
            <p style="padding-left: 30px;margin-left: 10px;padding-bottom: 0px;margin-bottom: 5px;">
                {{ $answer->answer_detail }}
            </p>
            <p style="color: #6a737c;padding-left: 30px;margin-left: 10px;">
                Answered by {{ $answer->physician->name }}
            </p>
        </li>
            @if(auth()->user())
                @if($answer->id==auth()->user()->id)
                    <a href="/questions/answers/{{ $answer->id}}/edit" class="btn btn-success">Edit</a>

                    {!! Form::open([ 'url' => '/answers/destroy/'.$answer->id,'method' => 'DELETE' ]) !!}
                    {!! Form::submit('Cancel', array('class'=>'btn btn-danger')) !!} 
                    {!! Form::close() !!}
                @endif
            @endif
            <hr style="margin-bottom: 0px;margin-top: 0px;margin-left: 10px;">
        @endforeach
    </ul>
<!--Test Show-->
@stop
