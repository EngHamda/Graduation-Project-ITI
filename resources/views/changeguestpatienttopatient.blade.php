<head>
 <meta charset="utf-8">
      <title>jQuery UI Datepicker functionality</title>
      <link href="/css/jquery-ui.min.css" rel="stylesheet">
      <script src="/js/jquery-1.12.4.min.js"></script>
      <script src="/js/jquery-ui.min.js"></script>
 <script>
         $(function() {
            $( "#datepicker-1" ).datepicker();
         $( "#datepicker-2" ).datepicker();
         });
      </script>
	<title>requestform</title>
</head>
{!! Form::open(array('action'=>['AssistantController@update',$user->id],'method'=>'PUT','enctype'=>'multipart/form-data')) !!}
    
{!!  Form::label('name', 'Name'); !!}

    {!! Form::text('name',$value=$user->name);!!}
<br>
   



{!!  Form::label('birth_date', 'birth_date'); !!}
{!! Form::text('birth_date',$value=$user->birth_date,['id' => 'datepicker-1']);!!}
<br>



{!!  Form::label('gender', 'gender'); !!}
{!! Form::text('gender',$value=$user->gender);!!}


<br>



<br>



{!!  Form::label('phone', 'phone'); !!}
{!! Form::text('phone',$value=$user->phone);!!}


<br>

<br>



{!!  Form::label('buildingnumber', 'buildingnumber'); !!}
{!! Form::text('buildingnumber',$value=$user->buildingnumber);!!}


<br>


<br>



{!!  Form::label('street', 'street'); !!}
{!! Form::text('street',$value=$user->street);!!}





<br>
{!!  Form::label('city', 'city'); !!}
{!! Form::text('city',$value=$user->city);!!}

<br>
{!!  Form::label('country', 'country'); !!}
{!! Form::text('country',$value=$user->country);!!}

<br>
{!!  Form::label('patientweight', 'patientweight'); !!}
{!! Form::text('patientweight',$value=null);!!}
<br>

{!!  Form::label('patientheight', 'patientheight'); !!}
{!! Form::text('patientheight',$value=null);!!}
<br>

{!!  Form::label('patientbloodgroup', 'patientbloodgroup'); !!}
{!! Form::text('patientbloodgroup',$value=null);!!}
<br>


{!!  Form::label('patientemergencyphone', 'patientemergencyphone'); !!}
{!! Form::text('patientemergencyphone',$value=null);!!}
<br>


{!!  Form::label('patientnationality', 'patientnationality'); !!}
{!! Form::text('patientnationality',$value=null);!!}
<br>

{!!  Form::label('patientnationalid', 'patientnationalid'); !!}
{!! Form::text('patientnationalid',$value=null);!!}
<br>





{!!  Form::label('main_image', 'Main_image'); !!}
{!! Form::file('main_image');!!}





{!! Form::submit('Click Me!');!!}















{!! Form::close() !!}

