$(document).ready(function(){
   
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






$("#passwordconfirm").blur(function(){
		var passwordconfirm=$("#passwordconfirm").val();
		var passwordconfirmlength = passwordconfirm.length;
		if(passwordconfirmlength<6)
		{

		$("#passwordconfirmerror").html("<b>password can't be less than 6 character <b>").css({'color':'#891818'});

		}

});

$("#passwordconfirm").focus(function(){
       
	$("#passwordconfirmerror").html(" ");
});



$("#name").focus(function(){
       
	$("#nameerror").html(" ");
});



$("#name").blur(function(){
$name=$("#name").val().length;
console.log($name);
       if($name==0)
{
	$("#nameerror").html("*required ").css({'color':'#891818'});
}
});










$(function(){ 
  $('#passwordconfirm').keyup(function() {
 if($('#passwordconfirm').val() == $('#password').val() )
{
$("#message").html("match").css({'color':'green'});
}
else{
$("#message").html(" not match").css({'color':'#891818'});
}

  });
});






       
});

