@extends('layouts.main')

@section('content')
<div>
@foreach($requests as $request)
<p>{{$request->user->name}}<p>
<p>{{$request->advertisementrequstdate}}<p>

@if($request->isconfirmed==0)
<a href="/medicalcompany/confirmdoctorrequest/{{$request->id}}">confirmrequest</a>
@endif

@if($request->isconfirmed==1)
<p>confirmed already</p>
@endif


@endforeach


</div>



<form method="POST" action="{{ url('/medicalcompany/storead') }}" enctype="multipart/form-data">
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="medicalcompany_id" value="{{auth()->guard('medicalcompany')->user()->id}}"  >
    <div class="form-group">
     <label>Upload Advertisement</label>
     <input type="file" name="path" class="form-control">
    </div>

    <div class="form-group">

     <label>Name</label>
     <input type="text" name="name" class="form-control" >

    </div>
     <button type="submit" class="btn btn-info"> submit</button>


</form>

<div class="container">
@foreach($allAds as $ad)
 <img src="/images/{{$ad->path}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
 @endforeach
</div>
@stop








