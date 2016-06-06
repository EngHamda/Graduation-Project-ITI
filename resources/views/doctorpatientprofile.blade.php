@extends("layouts.main")
@section("content")
<head>


<script src="/js/jquery-1.12.4.min.js"></script>

</head>



email:<input type="text" class="patientemail">

<form name="input" class="patient_profile_form" method="POST" action="/test">
 pasthistory:  <br>
    <div class="copies">
        
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </div>
    <div class="line">
     <input id="pasthistory" type="text" name="content" placeholder="content" class="pasthistory"/>
<input id="pasthistorydate" type="text" name="content2" placeholder="content2" class="pasthistorydate"/>
        <input type="button" value="Add" class="add"  />
    </div>




surgicalhistory:
<div class="copiesofsurgicalhistory"></div>
<div class="lineofsurgicalhistory">
     <input id="surgicalhistory" type="text" name="content" placeholder="content" class="surgicalhistory"/>
<input id="surgicalhistorydate" type="text" name="content2" placeholder="content2" class="surgicalhistorydate"/>
        <input type="button" value="addsurgical" class="addsurgical"  />
    </div>

</form>




  <button onclick="send()">Click me</button> 





@stop
<script>

var token = '{{Session::token()}}';
</script>







