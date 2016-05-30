@extends('layouts.main')

@section('content')

   @foreach($advices as $advice)
    <article  data-adviceid="{{$advice->id}}">
        <a href="advices/{{$advice->id}}" >
            {{$advice->advice}}
            <br>
        </a>
        <div>
        <a href="#" class="like">like</a>
        <a href="#" class="like">dislike</a>
        </div>
    </article>
    <br>
    @endforeach



@stop

<script>
    var token = '{{Session::token()}}';
    var urlLike = '{{route('like')}}';
</script>