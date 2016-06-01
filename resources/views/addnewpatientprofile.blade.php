
<link rel="stylesheet" href="/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="/js/jquery-1.12.4.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="/js/bootstrap.min.js"></script> 
<head>
 <meta charset="utf-8">
      <title>jQuery UI Datepicker functionality</title>

      <link href="/css/jquery-ui.min.css" rel="stylesheet">
      <script src="/js/jquery-1.12.4.min.js"></script>
      <script src="/js/jquery-ui.min.js"></script>
 <script>
       



$(document).ready(function(){





  $(function() {
            $( "#datepicker-1" ).datepicker();
         $( "#datepicker-2" ).datepicker();
         });
   
$("#email").focus(function(){
	$("#emailerror").html(" ");      

});

$("#email").blur(function(){
        var string=$("#email").val();
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var res = re.test(string);
	if(!res)
	{

	$("#emailerror").html("<b>not valid email<b>").css({'color':'#891818'});
	
	}
});


$("#password").blur(function(){
	var password=$("#password").val();
	var passwordlength = password.length;
	if(passwordlength<6)
	{

	$("#passworderror").html("<b>password can't be less than 6 character <b>").css({'color':'#891818'});

	}

});



$("#password").focus(function(){
       
	$("#passworderror").html(" ");
});









       
});

















      </script>
	<title>requestform</title>
</head>
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


    
  
 
   </body>
</html>

  <button type="submit" class="btn btn-primary">submit </button>




</form>
</body>
</html>
