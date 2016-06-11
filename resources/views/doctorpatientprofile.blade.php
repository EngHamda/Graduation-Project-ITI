@extends("layouts.main")
@section("content")
<div id="updateMessage" style="display:none;">patient profile Updates</div>
<div id="successMessage" style="display:none;">Email doesn't Exist</div>
<div id="errorMessage" style="display:none;">patient profile doexn't Exist</div>


National ID:<input type="text" class="patientemail">

<form name="input" id="patient_profile_form" method="POST" action="/test"  class="form-inline"  >
 pasthistory:  <br>
    <div class="copies">
        
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="line">
     <input id="pasthistory" type="text" name="content" placeholder="content"   class="form-control" />
<input id="pasthistorydate" type="text" name="date" placeholder="content2" class="form-control"/>
        <input type="button" value="Add" id="add" class="btn btn-default" />
    </div>




surgicalhistory:
<div class="copiesofsurgicalhistory"></div>
<div class="lineofsurgicalhistory">
     <input id="surgicalhistory" type="text" name="content" placeholder="content" class="form-control"/>
<input id="surgicalhistorydate" type="text" name="date" placeholder="content2" class="form-control"/>
        <input type="button" value="addsurgical" id="addsurgical" class="btn btn-default" />
    </div>




allergies:
<div class="copiesofallergies"></div>
<div class="lineofallergies">
     <input id="allergies" type="text" name="content" placeholder="content" class="form-control"/>
<input id="allergiesdate" type="text" name="date" placeholder="content2" class="form-control"/>
        <input type="button" value="addallergies" id="addallergies" class="btn btn-default" />
    </div>



accident and injuries:
<div class="copiesofaccedent"></div>
<div class="lineofaccedent">
     <input id="accedent" type="text" name="content" placeholder="content" class="form-control"/>
<input id="accedentdate" type="text" name="date" placeholder="content2" class="form-control"/>
        <input type="button" value="addaccident" id="addaccedent" class="btn btn-default" />
    </div>




special needs:
<div class="copiesofspecialneeds"></div>
<div class="lineofspecialneeds">
     <input id="specialneeds" type="text" name="content" placeholder="content" class="form-control"/>

        <input type="button" value="special needs" id="addspecialneeds" class="btn btn-default" />
    </div>





family history:
<div class="copiesoffamilyhistory"></div>
<div class="lineoffamilyhistory">
     <input id="familyhistory" type="text" name="content" placeholder="content" class="form-control"/>

        <input type="button" value="familyhistory" id="addfamilyhistory" class="btn btn-default" />
    </div>






blood transfer:
<div class="copiesofbloodtransfer"></div>
<div class="lineofbloodtransfer">
     <input id="bloodtransfer" type="text" name="content" placeholder="content" class="form-control"/>
<input id="bloodtransferdate" type="text" name="date" placeholder="content2" class="form-control"/>
        <input type="button" value="blood transfer" id="addbloodtransfer" class="btn btn-default" />
    </div>







miscarriage:
<div class="copiesofmis"></div>
<div class="lineofmis">
     <input id="mis" type="text" name="content" placeholder="content" class="form-control"/>
<input id="misdate" type="text" name="date" placeholder="content2" class="form-control"/>
        <input type="button" value="miscarriage" id="addmis" class="btn btn-default" />
    </div>



presciption

<div class="copiesofp"></div>
<div class="lineofp">

  
    
    <input  id="date" type="text" name="drug" placeholder="content" class="form-control"/>
 
   <input id="drug" type="text" name="date" placeholder="content" class="form-control"/>


<select name="frequency" id="freq">
  <option value="one">one</option>
  <option value="twice">twice</option>
  <option value="three times">three times</option>

</select> 



<select name="duration" id="duration">
  <option value="every year">every year</option>
  <option value="every mounth">every mounth</option>
  <option value="every week">every week</option>
  <option value="every day">every day</option>
 <option value="everyhour">everyhour</option>
</select> 

<input type="button" value="addp" id="addp" class="btn btn-default" />

  </div>
 

















 





</form>















 





  <button onclick="send()">submit</button> 







@stop
<script>

var token = '{{Session::token()}}';






</script>







