@extends('layouts.main')

@section('content')

    <form method="POST" action="{{ url('physician/storecompanyrequest') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <input type="hidden" value="{{ $advertisementid}}" name="advertisementid">



    enter time :<input type="text"  id="appointment_time" name="time" >

        <p id="error">


          <p>Enter Date: <input type="text" id="datepicker-1" name="date"></p>



      <button type="submit" class="btn btn-primary">submit </button>




    </form>

@stop
