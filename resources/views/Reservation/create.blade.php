@extends('layouts.main')
@section('title','Create')
@section('sidebar')
    create Sidebar
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Create Reservation</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                {{-- This comment will not be present in the rendered HTML --}}
                <div class="col-md-12">
                    {!! Form::open(array('action' => 'ReservationsController@store')
                                , array('class'=>'form-horizontal')) !!}
                    <div class="form-group row">
                        {!! Form::label('patient-name', 'Patient Name'  
                                ,array('class'=>'col-sm-3 form-control-label'))!!}
                        <div class="col-sm-9">
                            <!--<fieldset disabled>-->
                                {!! Form::text('patient-name', 'User_Name',array('class'=>' form-control', 'readonly')) !!}
                            <!--</fieldset>-->
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('clinic-name', 'Clinic Name'  
                                ,array('class'=>'col-sm-3 form-control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::select('clinic-name', array('L' => 'Large', 'S' => 'Small')
                                            , null, array('class'=>' form-control c-select',
                                                          'placeholder' => 'Clinic Name')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('physician-name', 'Physician Name'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::select('physician-name', array('L' => 'Large', 'S' => 'Small')
                                            , null, array('class'=>' form-control c-select',
                                                          'placeholder' => 'Physician Name')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('clinic-day', 'Reservation Time'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-4">
                            {!! Form::select('clinic-day', array('saturday' => 'Saturday', 
                                                                 'sunday' => 'Sunday', 
                                                                 'monday' => 'Monday')
                                            , null, array('class'=>' form-control c-select',
                                                          'placeholder' => 'Reservation Day')) !!}
                        </div>
                        <div class="col-sm-5">
                            {!! Form::select('clinic-time', array('01.00am' => '01.00 pm - 03.00 pm', 
                                                                  '07.00am' => '07.00 pm - 10.00 pm')
                                            , null, array('class'=>' form-control c-select',
                                                          'placeholder' => 'Reservation hour')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('reservation-status', 'Reservation Status'  
                                        ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            <label class="col-sm-6 ">
                                {!! Form::radio('reservation-confirmed', '0', false) !!}
                                Unconfirm Reservation
                            </label>
                            <label class="col-sm-6 ">
                                {!! Form::radio('reservation-confirmed', '1', true) !!}
                                Confirm Reservation
                            </label>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('reservation-number', 'Number of Reservation'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::number('reservation-number', null, 
                                              array('class'=>' form-control',
                                                    'placeholder' => 'Number of Reservation')) !!}
                        </div>
                    </div>
                    <div class='col-sm-10 col-sm-offset-2'>
                        {!! Form::submit('Create Reservation', array('class'=>'btn btn-success col-sm-offset-2')) !!}                               
                        {!! Form::reset('Cancel Reservation', array('class'=>'btn btn-danger col-sm-offset-5')) !!}                               
                    </div>
                    {!! Form::close() !!} 
                    {{--Clinic Name: {{ $reservation->clinic_name }}  --}}
                    {{--echo Form::email($name, $value = null,
                      $attributes = array('class'=>' form-control',));||
                      $attributes = ['class'=>' form-control',]--}}
                    {{-- {{ Form::bsText('first_name') }} --}}
                    {{--Form::file($name, $attributes = array('class'=>'btn btn-default'));--}}
                </div>
            </div>
        </div>
    </div><!--./panel-->
@stop