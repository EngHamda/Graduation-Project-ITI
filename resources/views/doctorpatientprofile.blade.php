@extends("layouts.main")
@section("content")
<div id="updateMessage" style="display:none;">patient profile Updates</div>
<div id="successMessage" style="display:none;">Email doesn't Exist</div>
<div id="errorMessage" style="display:none;">patient profile doexn't Exist</div>


email:<input type="text" class="patientemail">

<form name="input" id="patient_profile_form" method="POST" action="/test"  class="form-inline"  >
 pasthistory:  <br>
    <div class="copies">
        
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="line">
     <input id="pasthistory" type="text" name="content" placeholder="content"   class="form-control" />
<input id="pasthistorydate" type="text" name="content2" placeholder="content2" class="form-control"/>
        <input type="button" value="Add" id="add" class="btn btn-default" />
    </div>




surgicalhistory:
<div class="copiesofsurgicalhistory"></div>
<div class="lineofsurgicalhistory">
     <input id="surgicalhistory" type="text" name="content" placeholder="content" class="form-control"/>
<input id="surgicalhistorydate" type="text" name="content2" placeholder="content2" class="form-control"/>
        <input type="button" value="addsurgical" id="addsurgical" class="btn btn-default" />
    </div>




allergies:
<div class="copiesofallergies"></div>
<div class="lineofallergies">
     <input id="allergies" type="text" name="content" placeholder="content" class="form-control"/>
<input id="allergiesdate" type="text" name="content2" placeholder="content2" class="form-control"/>
        <input type="button" value="addallergies" id="addallergies" class="btn btn-default" />
    </div>



accedent and injuries:
<div class="copiesofaccedent"></div>
<div class="lineofaccedent">
     <input id="accedent" type="text" name="content" placeholder="content" class="form-control"/>
<input id="accedentdate" type="text" name="content2" placeholder="content2" class="form-control"/>
        <input type="button" value="addaccedent" id="addaccedent" class="btn btn-default" />
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
<input id="bloodtransferdate" type="text" name="content2" placeholder="content2" class="form-control"/>
        <input type="button" value="blood transfer" id="addbloodtransfer" class="btn btn-default" />
    </div>







miscarriage:
<div class="copiesofmis"></div>
<div class="lineofmis">
     <input id="mis" type="text" name="content" placeholder="content" class="form-control"/>
<input id="misdate" type="text" name="content2" placeholder="content2" class="form-control"/>
        <input type="button" value="miscarriage" id="addmis" class="btn btn-default" />
    </div>






 





</form>
















<a href="/addprescription"> Add Prescription </a>



  <button onclick="send()">Click me</button> 







@stop
<script>

var token = '{{Session::token()}}';
</script>







