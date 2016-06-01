@extends('layouts.main')

@section('content')

   @foreach($advices as $advice)
    <article  data-adviceid="{{$advice->id}}">
        <a href="advices/{{$advice->id}}" >
            {{$advice->advice}}
            <br>
        </a>
        <div>
            <a href="#" class="like">{{Auth::user()->likes()->where('advice_id',$advice->id)->first()?Auth::user()->likes()->where('advice_id',$advice->id)->first()->liked==1?'You like this post':'Like':'Like'}}</a>
            <a href="#" class="like">{{Auth::user()->likes()->where('advice_id',$advice->id)->first()?Auth::user()->likes()->where('advice_id',$advice->id)->first()->liked==0?'You don\'t like this post':'Dislike':'Dislike'}}</a>
        </div>
    </article>
    <br>
    @endforeach



@stop

<script>
    var token = '{{Session::token()}}';
   {{--// var urlLike = '{{route('like')}}';--}}
</script>