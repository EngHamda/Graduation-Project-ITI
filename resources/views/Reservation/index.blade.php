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
                                        <a href="http://localhost:8000/reservations/{{ $reservation->id}}">
                                            {{ $reservation->reservation_number }}
                                        </a>
                                    </th>
                                    <td>{{ $reservation->reservation_day }}</td>
                                    <td>{{ $reservation->reservation_confirmed ? 'Confirmed' : 'Unconfirmed' }}</td>
                                    <td>{{ $patient_names[$i]->patient_name }}</td>
                                    <td>{{ $reservation->physician_name }}</td>
                                    <td>{{ $reservation->clinic_name }}</td>
                                    <td>
                                        <a href="http://localhost:8000/reservations/{{ $reservation->id}}/edit" class="btn btn-info">
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
@stop