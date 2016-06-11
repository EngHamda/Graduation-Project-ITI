@extends('layouts.main')
@section('title','Add New Clinic Time')
{{--@section('sidebar')
    create Sidebar
@stop--}}
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Add New Clinic Times</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('action' => 'ClinicTimesController@store')
                                , array('class'=>'form-horizontal', 'id'=>'add_times_form')) !!}
                    <div class="form-group row">
                        {!! Form::label('physician-name', 'Physician Name'  
                                ,array('class'=>'col-sm-3 form-control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::select('physician-name', $physicianList, null, 
                                              array('class'=>' form-control c-select',
                                                    'placeholder' => 'Physician Name', 
                                                    'id' => 'physician_clinic_times_id')) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('clinic-day', 'Clinic Day'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-9">
                            {!! Form::select('clinic-day', array(0 => 'Sunday', 1 => 'Monday', 
                                                                 2 => 'Tuesday', 3 => 'Wednesday', 
                                                                 4 => 'Thursday', 5 => 'Friday', 
                                                                 6 => 'Saturday')
                                            , null, array('class'=>' form-control c-select',
                                                          'placeholder' => 'Clinic Day', 
                                                          'id' => 'day_clinic_times_id')) !!}
                        </div>
                    </div>
                    <div class="form-group row container_clinic_times" >
<!--                        <div class="col-sm-3"></div>
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-3">
                        </div>-->
                    </div>
                    <div class="form-group row basic_clinic_times" >
                        {!! Form::label('time', 'Time'  
                                ,array('class'=>'col-sm-3 control-label'))!!}
                        <div class="col-sm-3">
                            {!! Form::text('time_from', null, 
                                                    array('class'=>' form-control',
                                                          'placeholder' => 'From', 
                                                          'id' => 'time_from', 
                                                          'readonly')) !!}
                        </div>
                        <div class="col-sm-3">
                            {!! Form::text('time_to', null, 
                                                    array('class'=>' form-control',
                                                          'placeholder' => 'To', 
                                                          'id' => 'time_to', 
                                                          'readonly')) !!}
                        </div>
                        <div class="col-sm-3">
                            <a href="#" hidden="true">
                                + add more times for this day
                                {{--$reservation->reservation_number--}}
                            </a>
                        </div>
                        
                    </div>
                    
                    
                    <div class='col-sm-10 col-sm-offset-2'>
                        {!! Form::submit('Add Times', array('class'=>'btn btn-success col-sm-offset-2')) !!}                               
                        {!! Form::reset('Reset Form', array('class'=>'btn btn-danger col-sm-offset-5')) !!}                               
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