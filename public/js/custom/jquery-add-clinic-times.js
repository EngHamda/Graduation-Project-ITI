//declairation
var basic_from = $('#time_from');//from
var basic_to   = $('#time_to');//to
var from;
var to;
var count=1;

//1- create ajax to get days
$('#physician_clinic_times_id').on('click', function(e){
    var physician_id = e.target.value;
    console.log(physician_id);
//    $.getJSON('days', {'physician_id':physician_id}, function(data){
//        console.log(data);
////        $('#physician_id').append('');
//    });
});
$('#day_clinic_times_id').on('click', function(e){
    //var physician_id = e.target.value;
    //console.log(physician_id);
    $("#time_from").attr("readonly", false);
    rome(time_from, {date: false});
    $("#time_to").attr("readonly", false);
    rome(time_to, {date: false});
});
$("#time_to").focus(function() {
        from = basic_from.val();//from
        to   = basic_to.val();//to
        //console.log(from,to);
//        if(from !="" && to !="" ){
////            console.log("good");
////            $("a").show();
//        }
});
//2- append input field to forms

//$('#add_times_form') .on('click', 'a', function(event){
//    //#more_times
//    event.preventDefault();
//    from = basic_from.val();//from
//    to   = basic_to.val();//to 
//    var html ='<div class="col-sm-3">'
//             +'<input class=" form-control" placeholder="From" id="time_from'+ count +'" name="time_from' + count +'" type="text" value="' + from + '" "readonly" />'
//             +'</div><div class="col-sm-3">'
//             +'<input class=" form-control" placeholder="To" id="time_to'+ count +'" name="time_to' + count +'" type="text" value="' + to + '" "readonly" />'
//             +'</div><div class="col-sm-3">'
//             +'<a href="#" id="remove" style="display: inline;">Remove</a>'
//             +'</div>';
//    $(html).appendTo(container_clinic_times);//emptydiv
//    basic_from.val('');
//    basic_to.val('');
//    count++;//counter
//}).on('click', '#remove', function(){
//    $(this).parents('#line').remove();
//     count--;
//});
