@extends('layouts.main')

@section('content')
<body>

<form method="POST" action="{{ url('assistant/addnewpatientprofile') }}" enctype="multipart/form-data"  >


 <label>name</label>
<input type="text"   name="name" >

<br>
 <label>E-Mail Address</label>
<input type="text"   name="email" id="email" >
<div id="emailerror"></div>
<br>
<label>password</label>
<input type="password"   name="password" id="password" >
<div id="passworderror"> </div> 
<br>
<label>phone</label>
<input type="text"   name="phone" >
<br>

<label>gender</label>
<input type="text"   name="gender" >
<br>
<label>birthdate</label>
 <input type="text" id="datepicker-1" name="dateofbirth">
<br>

<label>building number</label>
 <input type="text"  name="buildingnumber">

<br>
 

  <label>street</label>
 <input type="text" name="street">
<br>
  <label>city</label>
 <input type="text" name="city">

 
  <br>
  
 <label>country</label>
 <input type="text" name="country">

 
  <br>

 <label>profilepicture</label>
 <input type="file" name="profilepicture">
<br>
 <label>weight</label>
 <input type="text" name="patientweight">
<br>
<label>height</label>
 <input type="text" name="patientheight">
<br>
<label>bloodgroup</label>
 <input type="text" name="bloodgroup">
<br>

<label>emergencyphone</label>
 <input type="text" name="emergencyphone">
<br>
<label>nationality</label>
 <input type="text" name="nationality">
<br>

<label>nationalid</label>
 <input type="text" name="nationalid">

<br>


<label>Dmissiontime</label>
<input type="text" id="datepicker-2" name="Dmissiontime">


<br>


<input type="hidden" name="_token" value="{{ csrf_token() }}">


  
  
 



  <button type="submit" class="btn btn-primary">submit </button>




</form>
</body>
@stop
