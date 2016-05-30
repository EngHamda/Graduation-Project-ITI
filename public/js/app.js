
// Like and Dislike
$('.like').on('click',function(event)
    {
        // Prevent default behavior
        var adviceId =event.target.parentNode.parentNode.dataset()
        event.preventDefault();

       var isLike = event.target.previousElementSibling==null;

        $.ajax({
            method: 'POST',
            url:'urlLike',
            data:{
                isLike:isLike,postId:,_token:token
            }



    })

    })
