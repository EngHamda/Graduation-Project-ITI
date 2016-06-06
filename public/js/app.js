
// Like and Dislike
$('.like').on('click',function(event)
    {
            //console.log(event);
        // Prevent default behavior
        var adviceId =event.target.parentNode.parentNode.dataset['adviceid'];
        event.defaultPrevented;

       var isLike = event.target.previousElementSibling==null;

        $.ajax({
            method: 'POST',
            url:'http://localhost:8000/advices/like',
            data:{
                isLike:isLike,adviceId:adviceId,_token:token
            }
        }).done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });

    })


//$(function()
//        {
//            $( "#datepicker-1" ).datepicker();
//        });


$(document).ready(function(){

    $(function() {
        $( "#datepicker-1" ).datepicker();
        $( "#datepicker-2" ).datepicker();
        $("#datepicker-3").datepicker();
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


$('#medical').on('click',function(){

    $('#myModal').hide();
    $('#myModal1').modal('show');


})
