@extends('layouts.main')

@section('content')




<form   method="POST" action="/addprescription"  class="form-inline"  >


<div class="form-group">
    <label for="email">Email address:</label>
    <input  type="text" value="email" name="email" placeholder="content" class="form-control"/>
  </div>

<br>
<br>
<div class="form-group">
    <label for="email">Drug name:</label>
    <input  id="mis" type="text" name="drug" placeholder="content" class="form-control"/>
  </div>


<div class="form-group">
    <label for="email">Date:</label>
   <input id="mis" type="text" name="date" placeholder="content" class="form-control"/>
  </div>



<div class="form-group">
    <label for="email">Frequency:</label>
   


<select name="frequency">
  <option value="volvo">one</option>
  <option value="saab">twice</option>
  <option value="mercedes">three times</option>

</select> 

  </div>



 <input type="hidden" name="_token" value="{{ csrf_token() }}">




<div class="form-group">
    <label for="email">Duration:</label>
  

 <select name="duration">
  <option value="every year">every year</option>
  <option value="every mounth">every mounth</option>
  <option value="every week">every week</option>
  <option value="every day">every day</option>
 <option value="everyhour">everyhour</option>
</select> 
 </div>




<input type="submit" value="Add Prescription" id="prescription" class="btn btn-default" />

</form>
@stop

