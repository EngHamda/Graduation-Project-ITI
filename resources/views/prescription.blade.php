
<form name="input" id="patient_profile_form" method="POST" action="/addprescription"  class="form-inline"  >

email:
 <input  id="mis" type="text" value={{$email}} name="email" placeholder="content" class="form-control"/>

drug name:
 <input  id="mis" type="text" name="drug" placeholder="content" class="form-control"/>

date:
<input id="mis" type="text" name="date" placeholder="content" class="form-control"/>


     <input type="hidden" name="_token" value="{{ csrf_token() }}">


frequency:
<select name="frequency">
  <option value="volvo">one</option>
  <option value="saab">twice</option>
  <option value="mercedes">three times</option>

</select> 




duration:
 <select name="duration">
  <option value="every year">every year</option>
  <option value="every mounth">every mounth</option>
  <option value="every week">every week</option>
  <option value="every day">every day</option>
 <option value="everyhour">everyhour</option>
</select> 



</form>
