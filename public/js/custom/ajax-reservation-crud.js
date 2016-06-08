//1-make get route return all clinics
//2-write this code

$('#clinic_id').on('click', function(e){
    var clinic_id = e.target.value;
    console.log(clinic_id);
    $.getJSON('physicians', {'clinic-id':clinic_id}, function(data){
        console.log(data);
        $("#physician_id").empty();
        $.each(data, function(value,key) {
            $("#physician_id").append($("<option></option>")
               .attr("value", value).text(key));
          });
//        $('#physician_id').append('');
    });
});

$('#physician_id').on('click', function(e){
    var ex = document.getElementById("clinic_id");
    var clinic_id = ex.options[ex.selectedIndex].value;
//    var clinic_id = $('#clinic_id').value;
    var physician_id = document.getElementById("physician_id").value;//e.target.value;
    console.log(clinic_id, physician_id);
    $.getJSON('days', 
    {
        'clinic_id':clinic_id, 
        'physician_id':physician_id
    }, 
    function(data){
        $("#reserve_day").attr("readonly", false);
        console.log(data); 
        var days = [];
        var time_value;
        var unreserv_days= [0,1,2,3,4,5,6];
        var key ;
        var reserev_times = [];
//        var reseration_day;
//        var i;
        $.each(data, function(index, item) {
            time_value = item.start+' - '+item.end;
            item.time = time_value;
            days.push(parseInt(item.day));            
        }); // edit-in-days-which-from-server end 
        var unique_days = days.filter(function(itm,i,days){
            return i === days.indexOf(itm);
        });  // remove-duplicates-from-days-array
        console.log(unique_days);
        $.each(unique_days, function(index, item) {
            //get index of item
            key = unreserv_days.indexOf(item);
            unreserv_days.splice(key, 1);
        }); // get-unrserved-days end
        console.log(unreserv_days);
        rome(reserve_day, { 
            time: false, 
            dateValidator: function(date) { //sat. is 6 and sun is 0
                var count = unreserv_days.length;
                switch(count){
                    case 1:
                        return rome.moment(date).day() !== unreserv_days[0];
                        break;
                    case 2:
                        return rome.moment(date).day() !== unreserv_days[0] && rome.moment(date).day() !== unreserv_days[1] ;
                        break;
                    case 3:
                        return rome.moment(date).day() !== unreserv_days[0] && rome.moment(date).day() !== unreserv_days[1]  && rome.moment(date).day() !== unreserv_days[2] ;
                        break;
                    case 4:
                        return rome.moment(date).day() !== unreserv_days[0] && rome.moment(date).day() !== unreserv_days[1]  && rome.moment(date).day() !== unreserv_days[2] && rome.moment(date).day() !== unreserv_days[3]  ;
                        break;
                    case 5:
                        return rome.moment(date).day() !== unreserv_days[0] && rome.moment(date).day() !== unreserv_days[1]  && rome.moment(date).day() !== unreserv_days[2] && rome.moment(date).day() !== unreserv_days[3] && rome.moment(date).day() !== unreserv_days[4]   ;
                        break;
                    case 6:
                        return rome.moment(date).day() !== unreserv_days[0] && rome.moment(date).day() !== unreserv_days[1]  && rome.moment(date).day() !== unreserv_days[2] && rome.moment(date).day() !== unreserv_days[3] && rome.moment(date).day() !== unreserv_days[4] && rome.moment(date).day() !== unreserv_days[5] ;
                        break;
                    
                }// switch end
            }// date-validate end
        }); // reservation-day end
//        rome(reserve_day).options.reset();
        /**/
        $("#reserve_day").focus(function() {
        //    if($("#reserve_day").val()!== ""){
        //        console.log($("#reserve_day").val());
        //    }
        }).blur(function() {
            if($("#reserve_day").val()!== ""){
                var selected = $("#reserve_day").val();
                selected_day = selected.split("-");
                console.log(selected_day[0]);
                var reseration_day = new Date(selected_day[0],selected_day[2],selected_day[1]);
                                    //year-day-month
                var i = reseration_day.getDay()-1;
                console.log(i);
//                console.log(data);
                $("#reserve_time").empty();
//                $("#reserve_time").attr("readonly", false);
                $.each(data, function(index, value) {
                    //check if item has key day =item 
                    if(i === parseInt(value.day) ){
                        /**/
                        $("#reserve_time").append($("<option></option>")
                               .attr("value", value.time).text(value.time));
//                        console.log("x");
                    }
//                    else{console.log("fff");}
//                    key = unreserv_days.indexOf(item);
//                    unreserv_days.splice(key, 1);
                }); //  end
            }
        });
        /**/
    }); // get-days-from-server-and-show-it end
}); // on-physician-name end
//get number of day in week
//var selected_item;
//var selected_day ;

//$("#reserve_day").focus(function() {
////    if($("#reserve_day").val()!== ""){
////        console.log($("#reserve_day").val());
////    }
//}).blur(function() {
//    if($("#reserve_day").val()!== ""){
//        var selected = $("#reserve_day").val();
//        selected_day = selected.split("-");
//        console.log(selected_day[0]);
//        var reseration_day = new Date(selected_day[0],selected_day[2],selected_day[1]);
//                            //year-day-month
//        item = reseration_day.getDay();
//    }
//});
//$( "#reserve_day" ).change(function() {
//  console.log( "Handler for .focus() called." );
//});
//        console.log($("#reserve_day").val());
//        getDay();//Get the number of choosen day in a week
//3-make get route for above script 

/***********/

/*************/