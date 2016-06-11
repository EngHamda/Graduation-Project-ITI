@extends('layouts.main')
@section('title','Reservation details')
{{--@section('sidebar')
    show Sidebar
@stop--}}
@section('content')
    <div class="panel panel-default" id='show_reservation'>
        <div class="panel-heading">
          <h3 class="panel-title">
              Reservation Number {{ $reservation->reservation_number }} Details
          </h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h3>{{ $reservation->reservation_confirmed }}</h3>
                    <h4>Patient Name: {{ $reservation->patient->name }}</h4>
                    <h4>Physician Name: {{ $reservation->physician->name }}</h4>
                    <h4>Clinic Name: {{ $reservation->clinic->name }}</h4>
                    <h4>Day: {{ $reservation->reservation_day }}</h4>
                    <h4>Time: {{ $reservation->reservation_time }}</h4>
                    <h4>Reservation Number: {{ $reservation->reservation_number }}</h4>
                    <h4>Reservation Created_at: {{ $reservation->created_at }}</h4>
                    <h4>Reservation Updated_at: {{ $reservation->updated_at }}</h4>
                </div>  
<!--                <div class="col-md-4">
                    <img src="images/{{$reservation->profile_picture}}">
                    <h4><a href="http://localhost:8000/reservations/{{$reservation->id}}">{{$reservation->reservation_number}}</a></h4>
                </div>
                <div class="col-md-8">
                    <ul class="list-group">
                        <li class="list-group-item"></li>
                    </ul>                       
                </div>-->
            </div>
        </div>
    </div>
    <!--Test Show-->
@stop