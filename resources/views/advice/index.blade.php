@extends('layouts.main')
@section('title','Advices')
@section('content')

<div class="container">

<div class="row">
               @foreach($advices as $advice)
        <div class="col-sm-12 ">


                        <div class="advice">
                            <div class="row">
                        <article  data-adviceid="{{$advice->id}}">
                            <div class="col-sm-2">
                                @if($advice->user->profile_picture != '')<img src="{{ URL::to('/')}}/images/{{$advice->user->profile_picture }}" width="50" height="50">@endif

                            </div>
                            <div class="col-sm-8">
                                 {{$advice->advice}}

                                        @if(Auth::user())
                                            @if(Auth::user()->role_id!=4)

                                <a href="#" class="like">{{Auth::user()->likes()->where('advice_id',$advice->id)->first()?Auth::user()->likes()->where('advice_id',$advice->id)->first()->liked==1?'You like this post':'Like':'Like'}}</a>
                                <a href="#" class="like">{{Auth::user()->likes()->where('advice_id',$advice->id)->first()?Auth::user()->likes()->where('advice_id',$advice->id)->first()->liked==0?'You don\'t like this post':'Dislike':'Dislike'}}</a>
                                      @endif
                                    <div class="pull-right">

                                @if($advice->user_id==auth()->user()->id)
                                    <a href="advices/{{$advice->id}}/edit" class="btn btn-default">Edit</a>

                                    {!! Form::open(array('route' => ['advices.destroy',$advice->id],'method'=>'DELETE'))!!}
                                    {!! Form::submit('Delete',$attributes=['class'=>'btn btn-danger']) !!}
                                @endif
                                        </div>
                                        @endif

                            </div>
                        </article>

                </div>
               </div>
        </div>
               @endforeach

           </div>
       </div>




@stop

<script>
    var token = '{{Session::token()}}';

</script>
