@extends('layouts.main')
@section('title','Medical Company Profile')
@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-heading"><h3>Requests from physician</h3></div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Physician name</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td>{{$request->user->name}}</td>
                            <td> {{$request->user->advertisementrequsttime}}</td>
                            <td>{{$request->advertisementrequstdate}}</td>

                            @if($request->isconfirmed==0)
                                <td><a  class="btn btn-info" href="/medicalcompany/confirmdoctorrequest/{{$request->id}}">confirmrequest</a></td>
                            @endif

                            @if($request->isconfirmed==1)
                                <td>Confirmed </td>
                            @endif

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <form method="POST" action="{{ url('/medicalcompany') }}" enctype="multipart/form-data">
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








