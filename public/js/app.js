
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
