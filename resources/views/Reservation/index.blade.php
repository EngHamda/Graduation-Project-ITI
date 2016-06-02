@extends('layouts.main')
@section('title','Index')
@section('sidebar')
    Index Sidebar
@stop
@section('content')
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
                                        <a href="/patient/show/{{ $reservation->id}}">
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
                                        <a href="/patient/delayreservation/{{ $reservation->id}}" class="btn btn-info">
                                            Edit
                                        </a>
                                    </td>
                                    <td>

                                        {!! Form::open( array('url' => "/patient/delete/".$reservation->id, 'method' => 'delete')) !!}
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
@stop
