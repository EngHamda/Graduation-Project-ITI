@extends('layouts.main')

  @section('content')
{!! Form::open(array('action'=>['AssistantController@update',$user->id],'method'=>'PUT','enctype'=>'multipart/form-data')) !!}
    
{!!  Form::label('name', 'Name') !!}

    {!! Form::text('name',$value=$user->name,['class' => 'form-control'])!!}<br>
   

{!! Form::hidden('role_id', 2) !!}


{!!  Form::label('birth_date', 'birth_date')!!}
{!! Form::text('birth_date',$value=$user->birth_date,['id' => 'datepicker-1','class'=>'form-control'])!!}




{!!  Form::label('gender', 'gender')!!}
{!! Form::text('gender',$value=$user->gender,['class' => 'form-control'])!!}

{!!  Form::radio('gender', 'female', true); !!}
{!!  Form::radio('gender', 'male', true);   !!}



{!!  Form::label('phone', 'phone'); !!}
{!! Form::text('phone',$value=$user->phone,['class' => 'form-control']);!!}






{!!  Form::label('buildingnumber', 'buildingnumber') !!}
{!! Form::text('buildingnumber',$value=$user->buildingnumber,['class' => 'form-control'])!!}






{!!  Form::label('street', 'street') !!}
{!! Form::text('street',$value=$user->street,['class' => 'form-control'])!!}






{!!  Form::label('city', 'city') !!}
{!! Form::text('city',$value=$user->city,['class' => 'form-control'])!!}


{!!  Form::label('country', 'country')!!}
{!! Form::text('country',$value=$user->country,['class' => 'form-control'])!!}


{!!  Form::label('patientweight', 'patientweight') !!}
{!! Form::text('patientweight',$value=$patientprofile->patientweight,['class' => 'form-control'])!!}


{!!  Form::label('patientheight', 'patientheight') !!}
{!! Form::text('patientheight',$value=$patientprofile->patientheight,['class' => 'form-control'])!!}


{!!  Form::label('patientbloodgroup', 'patientbloodgroup') !!}
{!! Form::text('patientbloodgroup',$value=$patientprofile->patientbloodgroup,['class' => 'form-control'])!!}

{!! Form::select('size', array('A+' => 'A+', 'B+' => 'B+' , 'AB+' => 'AB+' , 'O+' => 'O+', 'O-' => 'O-' , 'A-' => 'A-'  ,'B-' => 'B-','AB-'=>'AB-'), $patientprofile->patientbloodgroup, ['placeholder' => 'Pick a size...']);!!}

{!!  Form::label('patientemergencyphone', 'patientemergencyphone') !!}
{!! Form::text('patientemergencyphone',$value=$patientprofile->patientemergencyphone,['class' => 'form-control'])!!}



{!!  Form::label('patientnationality', 'patientnationality') !!}
{!! Form::text('patientnationality',$value=$patientprofile->patientnationality,['class' => 'form-control'])!!}


{!!  Form::label('patientnationalid', 'patientnationalid') !!}
{!! Form::text('patientnationalid',$value=$patientprofile->patientnationalid,['class' => 'form-control'])!!}

{!!  Form::label('admission_date', 'admission') !!}
{!! Form::text('admission',$value=null,['id' => 'datepicker-3','class'=>'form-control'])!!}



{!!  Form::label('main_image', 'Main_image') !!}
{!! Form::file('main_image')!!}


{!! link_to("/patient/create/".$user->id, $title = "add reservation", $attributes = array(), $secure = null)!!}


{!! Form::submit('Click Me!')!!}


{!! Form::close() !!}

@stop

