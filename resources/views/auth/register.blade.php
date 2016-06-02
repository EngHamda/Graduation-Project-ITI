 <link rel="stylesheet" href="/css/bootstrap.min.css">
<script src="/js/jquery-1.12.4.min.js"></script>

<script>

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


</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
<input type="hidden" name="role_id" value="5">
                                <input type="text" class="form-control" name="name"  id="name" value="{{ old('name') }}" >
                                  <div id="nameerror"></div>
                                @if ($errors->has('name'))
                                    <span class="help-block" >
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email">
                                  <div id="emailerror">

                                 </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password">

<div id="passworderror"></div>   
             
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" id="passwordconfirm">
<div id="passwordconfirmerror"></div>  <div id="message"></div>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

