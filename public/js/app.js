
// Like and Dislike
$('.like').on('click',function(event)
    {
        // Prevent default behavior
        var adviceId =event.target.parentNode.parentNode.dataset['adviceid'];
        event.defaultPrevented;

       var isLike = event.target.previousElementSibling==null;

        $.ajax({
            method: 'POST',
            url:urlLike,
            data:{
                isLike:isLike,adviceId:adviceId,_token:token
            }



    })

    })
