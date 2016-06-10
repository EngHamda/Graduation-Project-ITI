@extends('layouts.main')

@section('content')


<form method="POST" action="{{ url('assistant/addnewpatientprofile') }}" enctype="multipart/form-data"  >

 <div class="form-group">
   <label>Name</label>
  <input type="text" name="name" class="form-control" >
 </div>

 <div class="form-group">
   <label>E-Mail Address</label>
  <input type="text"   name="email" id="email" class="form-control" >
  <div id="emailerror"></div>
 </div>

 <div class="form-group">
   <label>Password</label>
   <input type="password"   name="password" id="password" class="form-control">
   <div id="passworderror"> </div>
 </div>

 <div class="form-group">
   <label>Phone</label>
   <input type="text" name="phone" class="form-control">
 </div>

<label>Gender</label>
 <div class="form-group">
  <input type="radio" name="gender" value="male"> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other
</div>


 <div class="form-group">
   <label>Birthdate</label>
   <input type="text" id="datepicker-1" name="dateofbirth" class="form-control">
 </div>

 <div class="form-group">
   <label>Building Number</label>
   <input type="text"  name="buildingnumber" class="form-control">
 </div>

 
 <div class="form-group">
    <label>Street</label>
    <input type="text" name="street" class="form-control">
 </div>

 <div class="form-group">
   <label>City</label>
   <input type="text" name="city" class="form-control">
 </div>

 <div class="form-group">
   <label>Country</label>
   <input type="text" name="country" class="form-control">
 </div>
 

 <div class="form-group">
   <label>Profile Picture</label>
   <input type="file" name="profilepicture" class="form-control">
 </div>

 <div class="form-group">
   <label>Weight</label>
   <input type="text" name="patientweight" class="form-control">
 </div>

 <div class="form-group">
   <label>Height</label>
   <input type="text" name="patientheight" class="form-control">
 </div>

 <div class="form-group">
   <label>Blood Group</label>
   

 <select name="bloodgroup">
  <option value="A+">A+</option>
  <option value="B+">B+</option>
  <option value="AB+">AB+</option>
  <option value="O+">O+</option>
  <option value="A-">A-</option>
  <option value="B-">B-</option>
  <option value="AB-">AB-</option>
   <option value="0-">O-</option>
</select> 







 </div>

 <div class="form-group">
   <label>Emergency Phone</label>
   <input type="text" name="emergencyphone" class="form-control">
 </div>

 <div class="form-group">
   <label>Nationality</label>
   <input type="text" name="nationality" class="form-control">
 </div>

 <div class="form-group">
    <label>National Id</label>
    <input type="text" name="nationalid" class="form-control">
 </div>

{{--<label>Admissiontime</label>--}}
{{--<input type="text" id="datepicker-2" name="Dmissiontime">--}}


 <input type="hidden" name="_token" value="{{ csrf_token() }}">

 <button type="submit" class="btn btn-info">Submit </button>

</form>


@stop
