@extends('layouts.main')

@section('content')

<div class="container">

       <div class="row">
           <div class="col-sm-6 ">
               <div class="row">
                   @foreach($advices as $advice)
                        <article  data-adviceid="{{$advice->id}}">
                            <div class="col-sm-4 well well-sm">
                                @if($advice->user->profile_picture != '')<img src="{{ asset('uploads/thumb') . '/'.  $advice->user->profile_picture }}">@endif

                            </div>
                            <div class="col-sm-8 well well-sm">
                                 {{--<a href="advices/{{$advice->id}}" >--}}
                                 {{$advice->advice}}

                                <br>{{--</a>--}}
                                <a href="#" class="like">{{Auth::user()->likes()->where('advice_id',$advice->id)->first()?Auth::user()->likes()->where('advice_id',$advice->id)->first()->liked==1?'You like this post':'Like':'Like'}}</a>
                                <a href="#" class="like">{{Auth::user()->likes()->where('advice_id',$advice->id)->first()?Auth::user()->likes()->where('advice_id',$advice->id)->first()->liked==0?'You don\'t like this post':'Dislike':'Dislike'}}</a>
                                @if($advice->user_id==auth()->user()->id)
                                    <a href="advices/{{$advice->id}}/edit" class="btn btn-default">Edit</a>

                                    {!! Form::open(array('route' => ['advices.destroy',$advice->id],'method'=>'DELETE'))!!}
                                    {!! Form::submit('Delete',$attributes=['class'=>'btn btn-danger']) !!}
                                @endif
                            </div>
                        </article>

                   @endforeach
               </div>
           </div>
       </div>
</div>



@stop

<script>
    var token = '{{Session::token()}}';
   {{--// var urlLike = '{{route('like')}}';--}}
</script>
