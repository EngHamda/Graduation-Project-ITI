@extends('layouts.main')

@section('content')

<div class="container">
 <div style="margin-top: 50px;"></div>
 <div class="row">
  <div class="col-sm-offset-2">
   <div class="col-sm-9">

<a href="/assistant/addnewpatientprofile" class="btn btn-info btn-block btn-lg"> AddNewPatient</a>
    <a href="/patient/create" class="btn btn-danger btn-block btn-lg"> Add Reservation</a>
  </div>
  </div>
</div>

@if(Session::has('status'))
  <div class="alert alert-info">
   <h1>{{Session::get('status')}}<h1>
  </div>
 @endif

  <div style="margin-top: 50px;"></div>
  <form  class="form-horizontal" method="POST" action="{{ url('assistant/searchpatientprofile') }}">
    <div class="row">

      <div class="col-lg-offset-3 col-md-6">

          <div class="form-group">
              <input type="text" name="email" class="form-control"> <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>

      </div>
    </div>

    <div class="row">

     <div class="col-lg-offset-3 col-md-6">
           <div class="form-group">
               <button type="submit" class="btn btn-info btn-block btn-lg">Search Patient By Email </button>
           </div>
     </div>
    </div>

  </form>




<div style="margin-top: 50px;"></div>
<!---->
<div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Reservations List</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                              <th>Reservation Number</th>
                              <th>Reservation Day</th>
                              <th>Reservation Time</th>
                              <th>Reservation Status</th>
                              <th>Patient Name</th>
                              <th>Physician Name</th>
                              <th>Clinic Name</th>
                              <th>Edit Reservation</th>
                              <th>Delete Reservation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0; ?>
                            @foreach($reservations as $reservation)
                            <tr>
                                <th scope="row">
                                    <!--<a href="#show_reservation">-->
                                    <a href="http://localhost:8000/reservations/{{ $reservation->id }}" >
                                    <!--<a href="/patient/show/{{-- $reservation->id--}}">-->
                                        {{ $reservation->reservation_number }}
                                    </a>
                                </th>
                                <td>{{ $reservation->reservation_day }}</td>
                                <td>{{ $reservation->reservation_time }}</td>
                                <td>{{ $reservation->reservation_confirmed }}</td>
                                <td>{{ $reservation->patient->name }}</td>
                                <td>{{ $reservation->physician->name }}</td>
                                <td>{{ $reservation->clinic->name }}</td>
                                <td>
                                    <a href="/reservations/{{ $reservation->id}}/edit" class="btn btn-info">
                                        Edit
                                    </a>
                                </td>
                                <td>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['reservations.destroy', $reservation->id]] ) !!}
                                    {!! Form::submit('Cancel', array('class'=>'btn btn-danger')) !!} 
                                    {!! Form::close() !!} 

                                    <!--<a href="http://localhost:8000/reservations/{{ $reservation->id}}/edit" class="btn btn-danger" >-->
                                        <!--Cancel-->
                                    <!--</a>-->
                                </td>
                            </tr>
                              <?php $i++; ?>
                              @endforeach
                          </tbody>
                    </table>
                </div><!--./table-responsive -->
            </div><!--./col -->
        </div><!--./row-->
    </div><!--./panel-body -->
</div><!--./panel-->
<!--Test Index-->

 </div>
@stop