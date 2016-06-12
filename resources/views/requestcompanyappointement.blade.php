@extends('layouts.main')
@section('title','Request')
@section('content')


<div class="row">
<img style="width: 100%;  height:250px;" src="{{ URL::to('/') }}/images/{{ $advertisement }}"  alt="{{ URL::to('/') }}/images/{{ $advertisement }}"> 
</div>




<div class="row">


    <form method="POST" action="{{ url('physician/storecompanyrequest') }}">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <input type="hidden" value="{{ $advertisementid}}" name="advertisementid" class="form-control">
<div class="form-group">
    <label>Enter time:</label>
<input type="text"  id="appointment_time" name="time"  class="form-control">
</div>

<div class="form-group">
     <label>Enter Date: </label>

          <input type="text" id="datepicker-1" name="date"   class="form-control"> 
</div>


      <button type="submit" class="btn btn-primary">submit </button>




    </form>

</div>








</div>







@stop
